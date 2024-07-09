<!-- config.php -->
<?php

session_start();

function isLoggedIn() {
    return isset($_COOKIE['user']);
}

function login($username) {
    // Set session variable
    $_SESSION['user'] = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    // Set cookie with 30 days expiration
    setcookie('user', htmlspecialchars($username, ENT_QUOTES, 'UTF-8'), time() + (30 * 24 * 60 * 60), "/");

}

function get($key) {
    // Return session variable if set, otherwise return cookie value
    if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    } elseif (isset($_COOKIE[$key])) {
        return $_COOKIE[$key];
    }
    return null;
}

function logout() {
    // Destroy session
    session_destroy();
    // Unset cookies
    setcookie('user', '', time() - 3600, "/");
}

// Fonction pour vérifier si le fichier JSON existe
function jsonFileExists($url) {
    $headers = @get_headers($url);
    if($headers && strpos($headers[0], '200')) {
        return true;
    }
    return false;
}

// Fonction pour créer un fichier JSON
function createJsonFile($filePath) {
    $data = [
        'key1' => 'value1',
        'key2' => 'value2',
        // Ajoutez vos données initiales ici
    ];
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    
    if(file_put_contents($filePath, $jsonData)) {
        return true;
    }
    return false;
}

function jsonfile($username) {
    $filname = $username.'.json'; // Nom du fichier JSON
    $url = 'http://manhwareader.test//'.$filname; // URL du fichier JSON local
    $filePath = __DIR__ . '/'.$filname; // Chemin absolu vers le fichier JSON sur le serveur
        // Vérifiez si le fichier JSON existe à l'URL spécifiée
    if (jsonFileExists($url)) {
        echo "Le fichier JSON existe.";
    } else {
        echo "Le fichier JSON n'existe pas. Création du fichier...";
        // Créez le fichier JSON
        if (createJsonFile($filePath)) {
            echo "Le fichier JSON a été créé avec succès.";
            echo "Le fichier JSON est disponible à l'URL: $url";
        } else {
            echo "Erreur lors de la création du fichier JSON.";
        }
    }
}