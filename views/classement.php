<?php
    $lstJeux=$model->getClassementJeux();
    function showGames($liste){
        foreach($liste as $jeu){    
            ?>
                <tr id='jeux'>
                    <th><?php echo $jeu['NomUti'].' '.$jeu['PrenUti'] ?></th>
                    <th><?php echo $jeu['TempsJeu'] ?></th>
                    <th><?php echo $jeu['NomJeu'] ?></th>
                </th>
            <?php
        }
    }
?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/navBar.css">
        <link rel="stylesheet" href="css/classement.css">
        <title>classement</title>
    </head>
    <body>
        <?php require_once('navBar.php') ?>
        <div class="classement">
            <table>
                <thead>
                    <tr>
                        <th>Joueur</th>
                        <th>Temps passé</th>
                        <th>Jeu favori</th>
                    </tr>
                </thead>
                <tbody>
                    <?php showGames($lstJeux); ?>
                </tbody>
            </table>
        </div>
    </body>