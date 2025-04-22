<?php
    if ($rola == "notlogged") {
        echo <<<login
        <a href="login.php">
            <img id="loginphoto" src="foto/login.png" alt="nie znaleziono">
        </a>
login;
}
    else {
        echo <<<logout
            <a href="logout.php">
                <img id="loginphoto" src="foto/logout.png" alt="nie znaleziono">
            </a>
logout;
}
?>