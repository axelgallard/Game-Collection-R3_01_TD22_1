<?php
    if (isset($_POST['mail']) && isset($_POST['mdp'])){
        $id=$model->getId($_POST['mail'],$_POST['mdp']);
        if ($id==-1){
            unset($_SESSION['id']);
        }else{
            $_SESSION['user'] = new User($id);
            echo $_SESSION['user']->getNomUti();
            
            
        }
        
        
        //header("Refresh:0");
    }
?>

<html>
    <div id="connection">
        <form method="POST">
            <input name="mail" id="mail" type="text" placeholder="E-Mail">
            <input name="mdp" id="mdp" type="text" placeholder="MDP">
            <input type="hidden" id="page" name="page" value="connection">
            <button type="submit">Se connecter</button>
        </form>
    </div>
</html>