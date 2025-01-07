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
        $gamesList = $this->model->getListeJeuByID($_SESSION['id']);
        $prenom = $_SESSION['user']->getPrenomUti();
        include 'views/bibliotheque.php'; 
    }

    public function ajoutFormError() {
        include 'views/ajoutJeux.php';
    }

    public function ajoutForm($platforme) {
        $this->model->ajoutForm($platforme);
        
        $this->bibliotheque();
    }

    public function classement() {
        $model=$this->model;
        include 'views/classement.php';
    }

    public function ajoutJeuRecherche($GameName) {
        $gamesList = $this->model->getLstJeuxByName($GameName);
        include 'views/ajoutJeux.php';
    }

    public function ajoutJeu() {
        $gamesList = $this->model->getLstJeux();
        include 'views/ajoutJeux.php';
    }
}
?>