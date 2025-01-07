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
            <input type="hidden" id="page" name="page" value="listeJeux">
        </form>

        <h2>Resultats de la recherche</h2>
            <?php 
                foreach($gamesList as $aGame){
                    ?>
                    <div class="game" style="background-image: url('<?php echo $aGame->getUrlCover() ?>')">
                        <form action="" method="POST">
                            <h3><?php echo $aGame->getNomJeu() ?></h3>
                            <p id="plateforme"><?php echo $aGame->getPlateformes() ?></p>
                            <button type="submit">Ajouter a la bibliothèque</button>

                            <input type="hidden" id="ajoutjeu" name="ajoutjeu" value="<?php echo $aGame->getNomJeu() ?>">
                            <input type="hidden" id="page" name="page" value="listeJeux">
                        </form>
                    </div>
                <?php 
                }
            ?>
        <h2>Vous ne trouvez pas votre bonheur ?</h2>
        <form action="" method="POST">
            <button type="submit">Ajouter un Nouveau jeu</button>
            <input type="hidden" id="AjoutForm" name="AjoutForm" value="AjoutForm">
            <input type="hidden" id="page" name="page" value="listeJeux">
        </form>
        
    </body>