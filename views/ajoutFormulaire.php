<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/navbar.css">
        <title>Ajout Formulaire</title>
    </head>
    <body>
        <!-- NAVBAR -->
        
        <!--        -->
        <h1>Ajouter un jeu a sa bibliothèque</h1>
        <p>Le jeu que vous souhaiter ajouter n'existe pas ! Vous pouvez le créer, celui-ci sera automatiquement ajouter a votre bibliothèque !</p>
        
        <form action="" method="POST">
            <p>Nom du jeu</p>
            <input type="text" id="Nom du jeu" name="Nom du jeu" value="" placeholder="Nom du jeu">

            <p>Editeur du jeu</p>
            <input type="text" id="Editeur du jeu" name="Editeur du jeu" value="" placeholder="Editeur du jeu">

            <input type="hidden" id="page" name="page" value="bibliotheque">
            <button type="submit">Ajouter le jeu</button>
        </form>

    </body>
</html>