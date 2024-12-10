<?php
    if (!isset($_SESSION['id'])){
        $_POST['page']="index";
        header("Refresh:0");
    }
    $infos=$model->getInfoUtilisateur($_SESSION['id']);
    var_dump($infos);
?>