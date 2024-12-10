<?php
	session_start();
	var_dump($_SESSION);
	var_dump($_POST);
	//unset($_SESSION["id"]);
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
		}else{
			$controller->index();
		}
	}else{
		$controller->index();
	}
?>
