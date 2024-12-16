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
            <input type="text" id="Nom du jeu" name="Nom du jeu" value="" placeholder="Nom du jeu" require>

            <p>Editeur du jeu</p>
            <input type="text" id="Editeur du jeu" name="Editeur du jeu" value="" placeholder="Editeur du jeu" require>

            <p>Sortie du jeu</p>
            <input type="date" id="Nom du jeu" name="Nom du jeu" value="" require>

            <p>Platfromes</p>
            <?php 
                if(isset($_POST['Error'])){
                    ?>
                        <p id="Error">Vous devez définir une platfrome pour pouvoir ajouter le jeu</p>
                    <?php
                }
            ?>
            <div id="checkbox">
                <p>PC</p>
                <input type="checkbox" id="PC" name="PC" checked="false">
                
                <p>Xbox</p>
                <input type="checkbox" id="Xbox" name="Xbox" checked="false">
                
                <p>Playstation</p>
                <input type="checkbox" id="Playstation" name="Playstation" checked="false">
                
                <p>Nintendo</p>
                <input type="checkbox" id="Nintendo" name="Nintendo" checked="false">

                <p>Mobile</p>
                <input type="checkbox" id="Mobile" name="Mobile" checked="false">
            </div>

            <input type="hidden" id="AjoutJeu" name="AjoutJeu" value="AjoutJeu">
            <input type="hidden" id="page" name="page" value="listeJeux">
            <button type="submit">Ajouter le jeu</button>
        </form>

    </body>
</html>