<?php
require 'vendor/autoload.php';

function get_db() {
    $mongo = new MongoDB\Client (
        "mongodb://localhost:27017/login" ,
        [
            'username' => 'wai_web' ,
            'password'=> 'w@i_w3b',
        ]);
    $db = $mongo->login;
    return $db;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $rpassword = trim($_POST['repeatpassword']);
    $email = trim($_POST['email']);
    if ($password != $rpassword) {
        echo "<div style='margin-top: 50px; text-align: center;'>";
        echo "Hasła nie są identyczne";
        echo "</div>";
        exit;
    }
    $hashed_password = password_hash($password, PASSWORD_BCRYPT); 
    $db = get_db();
    $existingUsers = $db->users; 
    $existingUser = $existingUsers->findOne(['login' => $login]);
    if ($existingUser) {
        echo "Użytkownik o tym loginie już istnieje!";
        exit;
    }
    $existingUsers->insertOne([
        'login' => $login,
        'password' => $hashed_password,
        'rpassword' => $rpassword,
        'e-mail' => $email,
    ]);
    header('Location: login.php');
    exit;
}
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
        <a href="index.php">Wróć do strony głównej</a>
    </nav>
    <form id = "loginform" action = "signin.php" method="post">
        <label for="login" style='text-align: center'>Login: </label>
        <input type = "text" id = "login" name = "login" required>
        <br>
        <label for="email" style='text-align: center'>E-mail: </label>
        <input type = "text" id = "email" name = "email" required>
        <br>
        <label for="password" style='text-align: center'>Hasło: </label>
        <input type = "password" id = "password" name = "password" required>
        <br>
        <label for="repeatpassword" style='text-align: center'>Powtorz hasło: </label>
        <input type = "password" id = "repeatpassword" name = "repeatpassword" required>
        <br>
        <button type="submit" style='margin: 5px'>Zarejestruj się</button>
    </form>
</body>
</html>