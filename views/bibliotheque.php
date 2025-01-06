<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/bibliotheque.css">
    <title>Bibliothèque</title>
</head>
<body>
    <?php require_once('navBar.php') ?>

    <div id="zoneImg">
        <h1>Salut <?php // echo $prenom ?> ! <br>
        PRÊT À AJOUTER DES JEUX A TA COLLECTION ?
        </h1>
    </div>

    <br>
    <h2>Mes jeux</h2>

    <div id="#gamesDisplayArea">

        <?php //displayLibraryGames() ?>

    </div>

</body>
</html>