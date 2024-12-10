<?php
    if (!isset($_SESSION['id'])){
        $_POST['page']="index";
        header("Refresh:0");
    }
    $infos=$model->getInfoUtilisateur($_SESSION['id']);
    var_dump($infos);
?>
<form method="POST">
    <input type="hidden" id="page" name="page" value="profil">
    <button type="submit">Déconnexion</button>
</form>