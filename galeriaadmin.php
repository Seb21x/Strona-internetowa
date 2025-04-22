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
$original_dir = "uploaded/oryginaly/";
$miniatury_dir = "uploaded/miniatury/";
$images = array_diff(scandir($miniatury_dir), array(".", ".."));

$images_per_page = 5;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$total_images = count($images);
$total_pages = ceil($total_images / $images_per_page);

if (isset($_POST['save_selected'])) {
    if (!isset($_SESSION['selected_images'])) {
        $_SESSION['selected_images'] = [];
    }
    if (isset($_POST['selected_images'])) {
        $_SESSION['selected_images'] = array_unique(array_merge($_SESSION['selected_images'], $_POST['selected_images']));
    }
}


if (isset($_POST['delete_image'])) {
    $file_to_delete = $watermark_dir . basename($_POST["delete"]);
    $original_file_to_delete = $original_dir . basename($_POST["delete"]);
    $miniatura_to_delete = $miniatury_dir . basename($_POST["delete"]);
    if (file_exists($file_to_delete)) {
        unlink($file_to_delete); 
        unlink($original_file_to_delete);
        unlink($miniatura_to_delete);
        $db->zdjinfo->deleteOne(['file_name' => basename($_POST["delete"])]);
    }
}

$start_index = ($current_page - 1) * $images_per_page;
$images_to_display = array_slice($images, $start_index, $images_per_page);
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
    </nav>
    <form method="post" style="text-align: center;">
    <?php foreach ($images_to_display as $image): ?>
        <?php
        $document = $db->zdjinfo->findOne(['file_name' => $image]);
        $title = $document['tytul'] ?? 'brak';
        $author = $document['autor'] ?? 'brak';
        $type = $document['type'] ?? '';
        $authorlogin = $document['authorlogin'] ?? '';
        $checked = isset($_SESSION['selected_images']) && in_array($image, $_SESSION['selected_images']) ? "checked" : "";
        ?>
        <?php if ($type == 'public' || $_SESSION['username'] == $authorlogin): ?>
            <div style="display: inline-block; text-align: center;">
                <a href="#" onclick="showModal('<?= $watermark_dir . $image ?>')">
                    <img src="<?= $miniatury_dir . $image ?>" alt="Zdjęcie" style="margin-top: 50px; cursor: pointer;"/>
                </a>
                <div style="margin-top: 10px;">
                    <strong>Tytuł:</strong> <?= htmlspecialchars($title) ?><br>
                    <strong>Autor:</strong> <?= htmlspecialchars($author) ?><br>
                    <?php if($type == 'private') :?>
                        <strong>Prywatne</strong>
                        <br>
                    <?php endif; ?>
                    <input type="checkbox" name="selected_images[]" value="<?= htmlspecialchars($image) ?>" <?= $checked ?>>
                </div>
                <input type="hidden" name="delete" value="<?= htmlspecialchars($image) ?>"/>
                <button type="submit" name="delete_image" class="artistbutton">Usuń</button>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <div style="margin-top: 20px; text-align: center;">
        <button type="submit" name="save_selected" class="artistbutton">Zapamiętaj wybrane</button>
    </div>
</form>

<div style="margin-top: 20px; text-align: center;">
    <a href="saved_images.php" class="artistbutton">Zapamiętane zdjęcia</a>
</div>

<?php if (empty($images)): ?>
    <div style="margin-top: 50px; text-align: center;">
        Brak zdjęć do wyświetlenia
    </div>
<?php endif; ?>

<div style='margin-top: 20px; text-align: center;'>
    <?php if ($current_page > 1): ?>
        <?php $prev_page = $current_page - 1; ?>
        <a href="?page=<?php echo $prev_page; ?>" style="margin-right: 10px;">Poprzednia strona</a>
    <?php endif; ?>
    <?php if ($current_page < $total_pages): ?>
        <?php $next_page = $current_page + 1; ?>
        <a href="?page=<?php echo $next_page; ?>" style="margin-right: 10px;">Następna strona</a>
    <?php endif; ?>
</div>

    <div id="imageModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8); justify-content: center; align-items: center; z-index: 1000;">
        <img id="modalImage" src="" alt="Zdjęcie" style="max-width: 90%; max-height: 90%;"/>
        <button onclick="closeModal()" class = "modal">Zamknij</button>
    </div>
    <script>
        function showModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageSrc;
            modal.style.display = 'flex';
        }
        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = 'none';
        }
    </script>
</body>
</html>