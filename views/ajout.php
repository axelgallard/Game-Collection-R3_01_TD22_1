    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/navbar.css">
        <title>Ajouter un Jeu</title>
    </head>
    <body>
        <!-- NAVBAR -->
        <?php require_once('navBar.php') ?>
        <!--        -->
        <h1>Ajouter un jeu a sa bibliothèque</h1>
        <form action="" method="POST">
            <input type="text" id="Recherche" name="Recherche" value="" placeholder="Rechercher un jeu" require>

            <button type="submit">Rechercher</button>
        </form>

        <h2>Resultats de la recherche</h2>
        <form action="">
            <?php 
                foreach($gamesList as $aGame){
                    ?>
                    <div class="game" style="background-image: url('<?php echo $aGame->getUrlCover() ?>')">
                        <h3><?php echo $aGame->getNomJeu() ?></h3>
                        <p id="plateforme"><?php echo $aGame->getPlateformes() ?></p>
                        <button type="submit">Ajouter a la bibliothèque</button>
                    </div>
                <?php 
                }
            ?>
        </form>
        
    </body>