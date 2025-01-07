    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/navbar.css">
        <title>Ajout Formulaire</title>
    </head>
    <body>
        <!-- NAVBAR -->
        <?php require_once('views/navBar.php') ?>
        <!--        -->
        <h1>Ajouter un jeu a sa bibliothèque</h1>
        <p>Le jeu que vous souhaiter ajouter n'existe pas ! Vous pouvez le créer, celui-ci sera automatiquement ajouter a votre bibliothèque !</p>
        
        <form action="" method="POST">
            <p>Nom du jeu</p>
            <input type="text" id="Nom du jeu" name="Nom du jeu" value="" placeholder="Nom du jeu" require>

            <p>Editeur du jeu</p>
            <input type="text" id="Editeur du jeu" name="Editeur du jeu" value="" placeholder="Editeur du jeu" require>

            <p>Sortie du jeu</p>
            <input type="date" id="Sortie du jeu" name="Sortie du jeu" value="" require>

            <p>Platfromes</p>
            <?php 
                if(isset($_POST['Error'])){
                    ?>
                        <p id="Error">Vous devez définir une platfrome pour pouvoir ajouter le jeu</p>
                    <?php
                }
            ?>
            <div id="checkbox">
                <p><input type="checkbox" id="PC" name="PC"> PC</p>
                
                <p><input type="checkbox" id="Xbox" name="Xbox"> Xbox</p>
                
                <p><input type="checkbox" id="Playstation" name="Playstation">Playstation</p>
                
                <p><input type="checkbox" id="Nintendo" name="Nintendo">Nintendo</p>

                <p><input type="checkbox" id="Mobile" name="Mobile">Mobile</p>
            </div>
            <input type="hidden" id="AjoutForm" name="AjoutForm" value="AjoutForm">
            <input type="hidden" id="page" name="page" value="bibliotheque">

            <!-- Crée un $_POST['Error'] qui permet de d'afficher une erreur si on revien directement sur cette page-->
            <input type="hidden" id="Error" name="Error" value="Error"> 
            
            <!-- Pas fini-->
            <button type="submit">Ajouter le jeu</button>
        </form>

    </body>