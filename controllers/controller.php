<?php

class Controller{

    private Model $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        include 'views/main.php';
    }

    public function connection() {
        $model=$this->model;
        include 'views/connection.php';
    }

    public function profil() {
        $model=$this->model;
        include 'views/profil.php';
    }

    public function bibliotheque() {
        include 'views/bibliotheque.php';
    }

    public function listeJeux() {
        include 'views/listeJeux.php';
    }
}
?>