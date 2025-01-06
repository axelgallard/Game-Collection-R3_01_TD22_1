<?php
    $errorMessage = "";
    if (isset($_POST['mail']) && isset($_POST['mdp'])){
        $id=$model->getId($_POST['mail'],$_POST['mdp']);
        if ($id==-1){
            unset($_SESSION['id']);
            $errorMessage = "Erreur : mot de passe ou e-mail incorrecte";
        }else{
            $_SESSION['id']=$id;
            $_SESSION['user'] = new User($id);            
        }
        header("Refresh:0");
    
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/connexion.css">
        <title>Connexion</title>
    </head>

    <body>
        <link rel="stylesheet" href="styles.css">
        <div id="connection">
            <h1>Se connecter à Game Collection</h1>
            <?php if (!empty($errorMessage)){ ?>
                <p id="error"><?php echo htmlspecialchars($errorMessage); ?></p>
            <?php } ?>
            <form method="POST">
                <p>E-Mail :</p>
                <input name="mail" id="mail" type="text" placeholder="E-Mail">
                <p>Mot de passe :</p>
                <input name="mdp" id="mdp" type="text" placeholder="MDP">
                <input type="hidden" id="page" name="page" value="connection">
                <button type="submit" class="connection-button">Se connecter</button>
            </form>
            <form method="post" action="">
                <input type="hidden" name="page" value="inscription">
                <button type="submit" class="inscription-button">S'inscrire</button>
            </form>
        </div>
        <!-- TODO faire le footer-->
    </body>
</html>