<?php
    if (!isset($_SESSION['id'])){
        $_POST['page']="index";
        header("Refresh:0");
    }
    $infos=$model->getInfoUtilisateur($_SESSION['id']);
    
    if (isset($_POST['suppression'])){
        $model->supprimeUti($_SESSION['id']);
        unset($_SESSION['id']);
        unset($_SESSION['user']);
        header("Refresh:0");
    }

    if (isset($_POST['deconnection'])){
        unset($_SESSION['id']);
        unset($_SESSION['user']);
        header("Refresh:0");
    }

    $blockageMDP=false;
    if (isset($_POST['mdp']) && isset($_POST['mdpConf'])){
        if ($_POST['mdp']!='' || $_POST['mdpConf']!=''){
            if($_POST['mdp']==$_POST['mdpConf']){
                $model->setMdpUti($_SESSION['id'],$_POST['mdp']);
            }else{
                $errorMessage = "Erreur : les mots de passent ne correspondent pas";
                $blockageMDP=true;
            }
        }
    }
    if(!$blockageMDP){
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail'])){
            $nbResul=$model->addresseMailLibre($_POST['mail']);
            if ($nbResul>0 && $_POST['mail']!=$infos['EmailUti']){
                $errorMessage = "Erreur : adresse mail déjà utilisée";
            }else{
                $model->setInfoUti($_SESSION['id'],$_POST['nom'],$_POST['prenom'],$_POST['mail']);
                header("Refresh:0");
            }
        }
    }
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/profil.css">
        <link rel="stylesheet" href="css/navBar.css">
        <title>Mon profil</title>
    </head>
    <body>
        <?php require_once('navBar.php') ?>
        <div id="info">
            <form method="POST">
                <h1>Inscription</h1>
                <?php if (!empty($errorMessage)){ ?>
                    <p id="error"><?php echo htmlspecialchars($errorMessage); ?></p>
                <?php } ?>
                <p>Nom :</p>
                <input name="nom" id="nom" type="text" placeholder="Nom" value="<?php echo $infos['NomUti'] ?>">
                <p>Prénom :</p>
                <input name="prenom" id="prenom" type="text" placeholder="prénom" value="<?php echo $infos['PrenUti'] ?>">
                <p>E-Mail :</p>
                <input name="mail" id="mail" type="text" placeholder="E-Mail" value="<?php echo $infos['EmailUti'] ?>">
                <p>Mot de passe :</p>
                <input name="mdp" id="mdp" type="text" placeholder="MDP" >
                <p>Confirmation mot de passe :</p>
                <input name="mdpConf" id="mdpConf" type="text" placeholder="Confirmation MDP">
                <input type="hidden" id="page" name="page" value="profil">
                <button type="submit" class="connection-button">Modifier</button>
            </form>
            <form method="post" action="">
                <input type="hidden" id="page" name="page" value="profil">
                <input type="hidden" name="suppression" value="suppression">
                <button type="submit" class="connection-button">Supprimer mon compte</button>
            </form>
            <form method="post" action="">
                <input type="hidden" id="page" name="page" value="profil">
                <input type="hidden" name="deconnection" value="deconnection">
                <button type="submit" class="connection-button">Se déconnecter</button>
            </form>
        </div>
    </body>
</html>