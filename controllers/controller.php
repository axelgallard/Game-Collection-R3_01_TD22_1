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

    public function ajoutJeuBibli($jeu){
        $this->model->ajoutJeuBibli($jeu);

        $this->ajoutJeu();
    }

    public function ModifJeu ($jeu){
        $jeu = $this->model->infoJeu($jeu);
        include 'views/ModifJeu.php';
    }

    public function afficheForm() {
        include 'views/ajoutFormulaire.php';
    }

    public function ajoutForm($platforme, $jeu) {
        $this->model->ajoutForm($platforme);
        $this->model->ajoutJeuBibli($jeu);
        
        $this->bibliotheque();
    }

    public function classement() {
        $model=$this->model;
        include 'views/classement.php';
    }

    public function ajoutJeuRecherche($GameName) {
        $gamesList = $this->model->getLstJeuxByName($GameName);
        $userGamesList = $this->model->getListeJeuByID($_SESSION['id']);
        include 'views/ajoutJeux.php';
    }

    public function ajoutJeu() {
        $gamesList = $this->model->getLstJeux();
        $userGamesList = $this->model->getListeJeuByID($_SESSION['id']);
        include 'views/ajoutJeux.php';
    }

    public function SupBibli($jeu) {
        $this->model->SupBibli($jeu);
        
        $this->bibliotheque();
    }

    public function ModifTemps($temps, $jeu){
        $this->model->ModifTemps($temps, $jeu);
        
        $this->bibliotheque();
    }

}
?>