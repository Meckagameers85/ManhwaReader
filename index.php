<!-- index.php -->
<?php
include 'config.php';

// if (isLoggedIn()) {
//     header('Location: welcome.php');
//     exit();
// }
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manhwa Reader</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="centered-container">
        <form action="home.php" method="post" onsubmit="return submitForm()">
            <label class="home" for="name">Votre Nom</label></br>
            <input class="home" type="text" id="name" name="name"></br>
            <button class="home" type="submit">Connecte Toi</button>
        </form>
    </div>
</body>
</html>
<script>
    function submitForm() {
        const username = document.getElementById('name').value;
        if (username === '') {
            alert('Veuillez entrer un nom.');
            return false;
        }
        return true;  // Allow form submission
    }
</script>
