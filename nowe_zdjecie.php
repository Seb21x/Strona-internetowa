<?php
require 'vendor/autoload.php';

function get_db() {
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/zdjinfo",
        [
            'username' => 'foto123',
            'password' => 'fotohaslo',
        ]
    );
    $db = $mongo->zdjinfo;
    return $db;
}

$watermark_dir = "uploaded/watermarkphoto/";
$original_dir = "uploaded/oryginaly/";
$miniatury_dir = "uploaded/miniatury/";
$images = array_diff(scandir($miniatury_dir), array(".", ".."));

if(isset($_SESSION['username'])) {
    $author = $_SESSION['username'];
}

$valid_format = false;

// Obsługa przesyłania pliku
if (isset($_FILES["zdjecie"])) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $file_name = $_FILES["zdjecie"]["tmp_name"];
    $file_size = $_FILES["zdjecie"]["size"];
    $file_size_mb = round($file_size / (1024 * 1024), 2);
    $mime_type = finfo_file($finfo, $file_name);
    if ($mime_type === "image/png" || $mime_type === "image/jpeg") {
        $valid_format = true;
    }

    if ($valid_format && $file_size_mb <= 1) {
        $db = get_db();
        $title = trim($_POST['tytul']);
        $author = trim($_POST['autor']);
        if (isset($_POST['publicprivate'])) {
            $type = $_POST['publicprivate'];
        }
        else {
            $type = 'public';
        }
        if (isset($_SESSION['username'])) {
            $login = $_SESSION['username'];
        }
        else {
            $login = 'user';
        }
        $file = $_FILES["zdjecie"];
        $file_name = basename($file["name"]);
        $original_target = $original_dir . $file_name;
        $target = $watermark_dir . $file_name;
        $target2 = $miniatury_dir . $file_name;
        $tmp_path = $file["tmp_name"];
        if (move_uploaded_file($tmp_path, $original_target)) {
            copy($original_target, $target);
            copy($original_target, $target2);
            $watermark_text = trim($_POST['tresc_znaku']);
            add_watermark($target, $watermark_text, $mime_type);
            resize_picture($target2, $mime_type);
            $fototitle = [
                'type' => $type,
                'authorlogin' => $login,
                'tytul' => $title,
                'autor' => $author,
                'file_name' => $file_name,
            ];
            $db->zdjinfo->insertOne($fototitle);
            echo "Zapisano dane do bazy.";
            
        }
    } else if ($file_size_mb >= 1){
        echo "Za duży plik";
    }
    else {
        echo "Zły format";
    }
}

function add_watermark($image_path, $text, $mime_type) {
    if ($mime_type === "image/png") {
        $image = imagecreatefrompng($image_path);
    } elseif ($mime_type === "image/jpeg") {
        $image = imagecreatefromjpeg($image_path);
    }

    $color = imagecolorallocate($image, 255, 0, 0); 
    $font_file = __DIR__ . "/Anton-Regular.ttf"; 
    $font_size = 50; 
    $margin = 100; 

    $bbox = imagettfbbox($font_size, 0, $font_file, $text);
    $text_width = $bbox[2] - $bbox[0];
    $text_height = $bbox[1] - $bbox[7];

    $x = imagesx($image) - $text_width - $margin;
    $y = imagesy($image) - $text_height - $margin;

    imagettftext($image, $font_size, 0, $x, $y, $color, $font_file, $text); 

    // Nadpisanie obrazu
    if ($mime_type === "image/png") {
        imagepng($image, $image_path);
    } elseif ($mime_type === "image/jpeg") {
        imagejpeg($image, $image_path);
    }
}

function resize_picture($image_path, $mime_type) {
    if ($mime_type === "image/png") {
        $image = imagecreatefrompng($image_path);
    } elseif ($mime_type === "image/jpeg") {
        $image = imagecreatefromjpeg($image_path);
    }
    $new_width = 200;
    $new_height = 125;
    $original_width = imagesx($image);
    $original_height = imagesy($image);
    $resized_image = imagecreatetruecolor($new_width, $new_height);

    imagecopyresampled(
        $resized_image, $image,
        0, 0, 0, 0, 
        $new_width, $new_height, 
        $original_width, $original_height 
    );

    if ($mime_type === "image/png") {
        imagepng($resized_image, $image_path);
    } elseif ($mime_type === "image/jpeg") {
        imagejpeg($resized_image, $image_path);
    }
}
?>
