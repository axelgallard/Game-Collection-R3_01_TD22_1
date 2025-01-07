<?php
	
	//var_dump($_SESSION);
	//var_dump($_POST);
	require_once 'vendor/autoload.php';
	include 'models/model.php';
	include 'controllers/controller.php';
	session_start();

	?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/index.css">
		<link rel="icon" type="image/png" href="ressources/logo.png">
	<?php

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
		} else if ($_POST["page"]=="classement"){
			$controller->classement();
		} else if ($_POST["page"]=="listeJeux"){
			if(isset($_POST["Recherche"]) AND $_POST["Recherche"] != ''){
				$controller->ajoutJeuRecherche($_POST['Recherche']);
			}					
			else if(isset($_POST["AjoutForm"])){
				if(isset($_POST["PC"])){
					if($_POST["PC"]==false && $_POST["Xbox"]==false && $_POST["Playstation"]==false && $_POST["Nintendo"]==false && $_POST["Mobile"]==false){
						echo 'ERREUR';
						$controller->afficheForm();
					}
					else{
						$platforme = '';
						if(isset($_POST["PC"]) && $_POST["PC"] == true){
							$platforme = $platforme . "PC ";
						}
	
						if(isset($_POST["Xbox"]) && $_POST["Xbox"] == true){
							$platforme = $platforme . "Xbox ";
						}
	
						if(isset($_POST["Playstation"]) && $_POST["Playstation"] == true){
							$platforme = $platforme . "Playstation ";
						}
	
						if(isset($_POST["Nintendo"]) && $_POST["Nintendo"] == true){
							$platforme = $platforme . "Nintendo ";
						}
						
						if(isset($_POST["Mobile"]) && $_POST["Mobile"] == true){
							$platforme = $platforme . "Mobile";
						}
	
						$controller->ajoutForm($platforme, $_POST["NomJeu"]);
					}
				}
				else {
					$controller->afficheForm();
				}
			}
			else if(isset($_POST['ajoutjeu'])){
				$controller->ajoutJeuBibli($_POST['ajoutjeu']);
			}
			else{
				$controller->ajoutJeu();
			}			
		}else{
			$controller->index();
		}
	}else{
		$controller->index();
	}
?>
