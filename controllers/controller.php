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
        include 'views/connexion.php';
    }

    public function inscription(){
        $model=$this->model;
        include 'views/inscription.php';
    }

    public function profil() {
        $model=$this->model;
        include 'views/profil.php';
    }

    public function bibliotheque() {
        include 'views/bibliotheque.php'; 
    }

    public function listeJeux() {
        $model=$this->model;
        include 'views/listeJeux.php';
    }

    public function ajoutFormError() {
        include 'views/ajoutJeux.php';
    }

    public function ajoutForm($platforme) {
        $this->model->ajoutForm($platforme);
    }
}
?>