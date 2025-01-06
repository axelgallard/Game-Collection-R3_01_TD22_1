<?php
	session_start();
	//var_dump($_SESSION);
	//var_dump($_POST);
	require_once 'vendor/autoload.php';
	include 'models/model.php';
	include 'controllers/controller.php';

	if (isset($_POST["deco"])){
		unset($_SESSION["id"]);
	}

	$controller = new Controller(new Model);

	if (isset($_POST["page"])){
		if ($_POST["page"]=="connection"){
			if (!isset($_SESSION["id"])){
				$controller->connection();
			}else{
				$controller->index();	
			}
		}else if ($_POST["page"]=="inscription"){
			$controller->inscription();
		}else if ($_POST["page"]=="profil"){
			$controller->profil();
		} else if ($_POST["page"]=="bibliotheque"){
			$controller->bibliotheque();
		}
		else if($_POST["page"]=="listeJeux"){
			if($_POST["AjoutJeu"]=="AjoutJeu"){
				if($_POST["PC"]==false && $_POST["Xbox"]==false && $_POST["Playstation"]==false && $_POST["Nintendo"]==false && $_POST["Mobile"]==false){
					echo 'ERREUR FDP';
					$controller->ajoutJeuError();
				}
				else{
					$controller->ajoutJeu();
				}
			}
			else{
				$controller->listeJeux();
			}		
		}else{
			$controller->index();
		}
	}else{
		$controller->index();
	}
?>
