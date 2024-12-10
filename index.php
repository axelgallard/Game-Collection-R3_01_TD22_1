<?php
	include 'models/model.php';
	include 'controllers/controller.php';

	$articlesController = new ArticleController(new ModelArticle);

	$articlesController->index();
?>
