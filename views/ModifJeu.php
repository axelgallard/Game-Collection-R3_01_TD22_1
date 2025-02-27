    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/modifJeu.css">
        <title>Modifier un jeu</title>
    </head>
    <body>
        <!-- NAVBAR -->
        <?php require_once('navBar.php') ?>
        <!--        -->
            <div id="infosJeu">
                <h1><?php echo $jeu->getNomJeu() ?></h1>
                <p><?php echo $jeu->getDescriptionJeu() ?></p>
                <p>Temps passé : <?php echo $jeu->getTempsJeu() ?> h</p>
            </div>

            <img src="<?php echo $jeu->getUrlCover() ?>" alt="Jaquette du jeu" id="coverJeu">

            <div id="ajoutTempsDeJeu">
                <h2>Ajouter du temps passé sur le jeu</h2>
                
                <form action="" method="POST">
                    <p>Temps passé sur le jeu</p>
                    <input type="text" id="temps" name="temps" value="<?php echo $jeu->getTempsJeu() ?>" require>

                    <button type="submit">Ajouter</button>
                    
                    <input type="hidden" id="NomJeu" name="NomJeu" value="<?php echo $jeu->getNomJeu() ?>"> 
                    <input type="hidden" id="ModifTemps" name="ModifTemps" value="">
                    <input type="hidden" id="page" name="page" value="ModifJeu">
                </form>
                
                <form action="" method="POST">
                    <button type="submit">Supprimer le jeu de ma bibliothèque</button>

                    <input type="hidden" id="NomJeu" name="NomJeu" value="<?php echo $jeu->getNomJeu() ?>">
                    <input type="hidden" id="SupBibli" name="SupBibli" value="">
                    <input type="hidden" id="page" name="page" value="ModifJeu">
                </form>
            </div>

        <?php require_once('footer.php') ?>
    </body>