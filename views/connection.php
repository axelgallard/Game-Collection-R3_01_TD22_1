<?php
    

    if (isset($_POST['nom']) && isset($_POST['prenom'])){
        $_SESSION["id"]=1;
        header("Refresh:0");
    }
?>

<html>
    <div id="connection">
        <form method="POST">
            <input name="nom" id="nom" type="text" placeholder="Nom">
            <input name="prenom" id="prenom" type="text" placeholder="Prénom">
            <input type="hidden" id="page" name="page" value="connection">
            <button type="submit">Se connecter</button>
        </form>
    </div>
</html>