<?php
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['mdpConf'])){
        $nbResul=$model->addresseMailLibre($_POST['mail']);
        if ($nbResul>0){
            $errorMessage = "Erreur : adresse mail déjà utilisée";
        }else if($_POST['mdpConf']!=$_POST['mdp']){
            $errorMessage = "Erreur : les mots de passent ne correspondent pas";
        }else{
            $model->insereUtilisateur($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['mdp']);
            $_SESSION['id']=$id;
            $_SESSION['user'] = new User($id);     
            header("Refresh:0");
        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/connexion.css">
        <title>inscription</title>
    </head>

    <body>
        <div id="connection">
            <form method="POST">
                <h1>Inscription</h1>
                <?php if (!empty($errorMessage)){ ?>
                    <p id="error"><?php echo htmlspecialchars($errorMessage); ?></p>
                <?php } ?>
                <p>Nom :</p>
                <input name="nom" id="nom" type="text" placeholder="Nom">
                <p>Prénom :</p>
                <input name="prenom" id="prenom" type="text" placeholder="prénom">
                <p>E-Mail :</p>
                <input name="mail" id="mail" type="text" placeholder="E-Mail">
                <p>Mot de passe :</p>
                <input name="mdp" id="mdp" type="text" placeholder="MDP">
                <p>Confirmation mot de passe :</p>
                <input name="mdpConf" id="mdpConf" type="text" placeholder="Confirmation MDP">
                <input type="hidden" id="page" name="page" value="inscription">
                <button type="submit" class="connection-button">S'inscrire</button>
            </form>
            <form method="post" action="">
                <input type="hidden" name="page" value="connection">
                <button type="submit" class="inscription-button">Se connecter</button>
            </form>
        </div>
        <!-- TODO faire le footer-->
    </body>
</html>