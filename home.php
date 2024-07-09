<!-- home.php -->
<?php

include 'config.php';

if (isLoggedIn()) {
    header('Location: welcome.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') : null;

    if (!empty($username)) {
        login($username);
        jsonfile($username);
        // header('Location: welcome.php');
        exit();
    } else {
        echo "Veuillez entrer un nom.";
    }
}
?>
