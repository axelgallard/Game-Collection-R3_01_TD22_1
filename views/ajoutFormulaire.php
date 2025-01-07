    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/footer.css">
        <title>Ajout Formulaire</title>
    </head>
    <body>
        <!-- NAVBAR -->
        <?php require_once('navBar.php') ?>
        <!--        -->
        <h1>Ajouter un jeu a sa bibliothèque</h1>
        <p>Le jeu que vous souhaiter ajouter n'existe pas ! Vous pouvez le créer, celui-ci sera automatiquement ajouter a votre bibliothèque !</p>
        
        <form action="" method="POST">
            <p>Nom du jeu</p>
            <input type="text" id="NomJeu" name="NomJeu" value="" placeholder="Nom du jeu" require>

            <p>Editeur du jeu</p>
            <input type="text" id="EditeurJeu" name="EditeurJeu" value="" placeholder="Editeur du jeu" require>

            <p>Sortie du jeu</p>
            <input type="date" id="SortieJeu" name="SortieJeu" value="" require>

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

            <!-- Crée un $_POST['Error'] qui permet de d'afficher une erreur si on revien directement sur cette page-->
            <input type="hidden" id="Error" name="Error" value="Error"> 
            
            <p>Description de jeu</p>
            <input type="textarea" id="DescJeu" name="DescJeu" value="" placeholder="Description de jeu" require>

            <p>URL de la cover</p>
            <input type="text" id="CouvertureJeu" name="CouvertureJeu" value="" placeholder="URL de la cover" require>

            <p>URL du site</p>
            <input type="text" id="URLSite" name="URLSite" value="" placeholder="URL du site" require>

            <button type="submit">Ajouter le jeu</button>

            <input type="hidden" id="AjoutForm" name="AjoutForm" value="AjoutForm">
            <input type="hidden" id="page" name="page" value="listeJeux">
        </form>
        <?php require_once('footer.php') ?>
    </body>