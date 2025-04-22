<?php
session_start();

require 'vendor/autoload.php';

function get_db() {
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/login",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]
    );
    return $mongo->login; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    $db = get_db();
    $usersCollection = $db->users; 

    $user = $usersCollection->findOne(['login' => $login]);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_role'] = $login === 'admin' ? 'admin' : 'user';
        $_SESSION['username'] = $login;
        header('Location: index.php');
        exit;
    } else {
        echo <<< WRONGPASSWORD
        <div class="textphp" style='text-align: center; color: darkred; margin-top: 20px;'>
            Zły login lub hasło
        </div>
WRONGPASSWORD;
    }
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
        <a href = "signin.php">Zarejestruj się</a>
    </nav>
    <form id = "loginform" action = "login.php" method="post">
        <label for="login" style='margin: 5px'>Login: </label>
        <input type = "text" id = "login" name = "login" required>
        <br>
        <label for="password" style='margin: 4px'>Hasło: </label>
        <input type = "password" id = "password" name = "password" required>
        <br>
        <button type="submit" style='margin: 5px'>Zaloguj</button>
    </form>
</body>
</html>