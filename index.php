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
		}else if ($_POST["page"]=="profil"){
			$controller->profil();
		} else if ($_POST["page"]=="bibliotheque"){
			$controller->bibliotheque();
		}
		else if($_POST["page"]=="listeJeux"){
			$controller->listeJeux();
		}else{
			$controller->index();
		}
	}else{
		$controller->index();
	}
?>
