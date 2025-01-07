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
		} else if ($_POST["page"]=="bibliotheque"){
			$controller->classement();
		} else if  ($_POST["page"]=="ajoutJeu"){
			$controller->ajoutJeu();		
		} else if($_POST["page"]=="listeJeux"){
			if($_POST["AjoutForm"]=="AjoutForm"){
				if($_POST["PC"]==false && $_POST["Xbox"]==false && $_POST["Playstation"]==false && $_POST["Nintendo"]==false && $_POST["Mobile"]==false){
					echo 'ERREUR FDP';
					$controller->ajoutFormError();
				}
				else{
					$platforme = '';
        			if($_POST["PC"] == true){
						$platforme = $platforme + "PC ";
					}

					if($_POST["Xbox"] == true){
						$platforme = $platforme + "Xbox ";
					}

					if($_POST["Playstation"] == true){
						$platforme = $platforme + "Playstation ";
					}

					if($_POST["Nintendo"] == true){
						$platforme = $platforme + "Nintendo ";
					}
					
					if($_POST["Mobile"] == true){
						$platforme = $platforme + "Mobile";
					}

					$controller->ajoutForm($platforme);
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
