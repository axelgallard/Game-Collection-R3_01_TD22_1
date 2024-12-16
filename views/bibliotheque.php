<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Bibliothèque</title>
</head>
<body>
    <div class="navBar">
        <ul id="navBar">
                        <a href="bibliotheque.php"><img src="ressources/logo.png" alt="Logo" id="logo" ></a>

                        <li id="rightSide"><a id="pad" href="profil.php">Profil</a></li> 
                        <li id="rightSide"><a id="pad" href="classement.php">Classement</a></li>
                        <li id="rightSide"><a id="pad" href="ajouterUnJeu.php">Ajouter un jeu</a></li>
                        <li id="rightSide"><a id="pad" href="bibliotheque.php"><u>Ma Bibliothèque</u></a></li>   
        </ul>
    </div>

    <div class="zoneImg">
        <h1>Salut <?php echo $prenom ?> ! <br>
        PRÊT À AJOUTER DES JEUX A TA COLLECTION ?
        </h1>
    </div>

</body>
</html>