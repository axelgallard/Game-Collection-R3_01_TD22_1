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
        <h1>Salut <?php echo $prenom ?> ! <br>
        PRÊT À AJOUTER DES JEUX A TA COLLECTION ?
        </h1>
    </div>

    <br>
    <h2>Mes jeux</h2>

    <div id="#gamesDisplayArea">

        <?php 
        foreach($gamesList as $aGame){
            ?>
            <h3><?php echo $aGame->getNomJeu() ?></h3>
            <p id="plateforme"><?php echo $aGame->getPlateformes() ?></p>
            <p id="tempsJeu"><?php echo $aGame->getTempsJeu() ?></p>
        <?php }
        ?>

    </div>

</body>
</html>