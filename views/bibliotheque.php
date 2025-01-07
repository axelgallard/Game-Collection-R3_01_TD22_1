<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
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

    <div id="gamesDisplayArea">

        <?php 
        foreach($gamesList as $aGame){
            ?>
            <div class="aGame" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%), url('<?php echo $aGame->getUrlCover() ?>');">
                <h3><?php echo $aGame->getNomJeu() ?></h3>
                <p id="tempsJeu"><?php echo $aGame->getTempsJeu() ?></p>
                <p id="plateforme"><?php echo $aGame->getPlateformes() ?></p>
                    
            </div>
        <?php }
        ?>

    </div>
    <?php require_once('footer.php') ?>
</body>
</html>

