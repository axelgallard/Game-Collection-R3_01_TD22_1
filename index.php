<?php
	
	//var_dump($_SESSION);
	//var_dump($_POST);
	require_once 'vendor/autoload.php';
	include 'models/model.php';
	include 'controllers/controller.php';
	session_start();
	
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
		} else if  ($_POST["page"]=="listeJeux"){
			if(isset($_POST["Recherche"])){
				$controller->ajoutJeuRecherche($_POST['Recherche']);
			}					
			else if(isset($_POST["AjoutForm"])){
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
				$controller->ajoutJeu();
			}			
		}else{
			$controller->index();
		}
	}else{
		$controller->index();
	}
?>
