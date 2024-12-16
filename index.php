<?php
	session_start();
	var_dump($_SESSION);
	var_dump($_POST);
	if (isset($_POST["deco"])){
		unset($_SESSION["id"]);
	}
	require_once 'vendor/autoload.php';
	include 'models/model.php';
	include 'controllers/controller.php';

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
		else{
			$controller->index();
		}
	}else{
		$controller->index();
	}
?>
