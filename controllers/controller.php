<?php

class ArticleController{

    private ModelArticle $modelArticle;

    public function __construct($modelArticle) {
        $this->modelArticle = $modelArticle;
    }

    public function index() {
        include 'views/main.php';
    }
}