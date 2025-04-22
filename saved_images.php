<?php
session_start();
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

$db = get_db();

$watermark_dir = "uploaded/watermarkphoto/";
$miniatury_dir = "uploaded/miniatury/";

if (isset($_POST['remove_selected'])) {
    if (isset($_POST['selected_images'])) {
        $_SESSION['selected_images'] = array_diff($_SESSION['selected_images'], $_POST['selected_images']);
    }
}

echo "<form method='post' style='text-align: center;'>";
if (isset($_SESSION['selected_images']) && count($_SESSION['selected_images']) > 0) {
    foreach ($_SESSION['selected_images'] as $image) {
        $document = $db->zdjinfo->findOne(['file_name' => $image]);
        $title = $document['tytul'] ?? 'brak';
        $author = $document['autor'] ?? 'brak';
        echo "
        <div style='display: inline-block; text-align: center;'>
            <a href='#' onclick='showModal(\"{$watermark_dir}{$image}\")'>
                <img src='{$miniatury_dir}{$image}' alt='Zdjęcie' style='margin-top: 50px; cursor: pointer;'/>
            </a>
            <div style='margin-top: 10px;'>
                <strong>Tytuł:</strong> {$title}<br>
                <strong>Autor:</strong> {$author}<br>
            </div>
            <div style='margin-top: 10px;'>
                <input type='checkbox' name='selected_images[]' value='{$image}'>
            </div>
        </div>";
    }
    echo "<div style='margin-top: 20px; text-align: center;'>
            <button type='submit' name='remove_selected' class = 'artistbutton'>Usuń zaznaczone z zapamiętanych</button>
        </div>";
} else {
    echo "<div style='margin-top: 50px; text-align: center;'>Brak zapamiętanych zdjęć</div>";
}
echo "</form>";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
</head>

<body>
    <nav>
        <a href = "index.php">Wróć do strony głównej</a>
        <a href = "galeriaadmin.php">Wróć do galerii</a>
    </nav>
</body>
</html>