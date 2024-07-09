<!-- welcome.php -->
<?php
include 'config.php';

if (!isLoggedIn()) {
    header('Location: index.php');
    exit();
}

$username = get('user');
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet">
    <title>Manhwa Reader</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #333;
        }
        .navbar {
            display: flex;
            justify-content: right;
            align-items: center;
            padding: 0rem 1rem;
            margin: 1rem;
            background-color: #454545;
            color: white;
            width: fit-content;
            float: right;
            border-radius: 20px;
            height: 75px;
        }
        .icone {
            font-size: 4rem;
        }
        .icone:hover {
            cursor: pointer;
            font-size: 4.2rem;
        }
        .username {
            font-size: 2rem;
            margin-right: 1rem;
        }
        .input-barre{
            width: 95%;
            height: 6rem;
            display: grid;
            grid-template-columns: 1fr 2fr 0.5fr 0.5fr;
            margin-left: 2.5%;
            background: lightgray;
            border-radius: 20px;
        }
        .input-barre input {
            font-size: 2rem;
            padding: 1rem;
            border-radius: 20px;
            margin: 1rem;
            height: 4rem;
        }
        .input-barre button {
            font-size: 2rem; 
            padding: 1rem; 
            border-radius: 20px; 
            margin: 1rem;
            background-color: #454545;
            color: white;
            border: none;
            height: 4rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <label class="username"><?= $username?></label>
        <i class="ri-account-circle-fill icone" onclick="disconect()"></i>
    </nav>
        <form class="input-barre">
            <input type="text" placeholder="Non du Manhwa" name="name">
            <input type="text" placeholder="Lien" name="lien">
            <input type="number" placeholder="Nn Chapitre lu" name="nbChap">
            <button>Send</button>
        </form>
    </div>
</body>
</html>

<script>
    function disconect() {
        const result = confirm('Voulez-vous vraiment vous déconnecter ?');
        if (result) {
            window.location.href = 'logout.php';
        }
    }
</script>
