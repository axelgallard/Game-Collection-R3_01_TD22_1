<?php
class Model{
    private $db;

    public function __construct() {
        $env = parse_ini_file('.env', true);

        $hostname =  $env['DB_HOST'];
        $dbname = $env['DB_NAME'];
        $username = $env['DB_USER'];
        $password = $env['DB_PASSWORD'];

        $this->db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8;", $username, $password);
    }

    public function getId($mail,$mdp){
        $stmt=$this->db->prepare("SELECT IdUti, MDPUti FROM utilisateur WHERE EmailUti LIKE :mail;");
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $mdpUti=$result['MDPUti'];
        if(password_verify($mdp, $mdpUti)){
            return $result['IdUti'];
        }else{
            return -1;
        }
    }
    
    public function getListeJeuByID($id){
        $stmt=$this->db->prepare("SELECT * FROM bibliotheque INNER JOIN JEU ON bibliotheque.NomJeu=jeu.NomJeu WHERE IdUti=:id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $liste=array();
        //TODO faire la boucle qui créer un objet et la renvoie la liste
        return $liste;
    }

    public function getInfoUtilisateur($id){
        $stmt=$this->db->prepare("SELECT * FROM utilisateur WHERE IdUti=:id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getLstJeux(){
        $stmt=$this->db->prepare("SELECT * FROM jeu");
        $stmt->execute();
        return $stmt;
    }

<<<<<<< Updated upstream
    public function ajoutForm($plateformes){
        $stmt=$this->db->prepare("INSERT INTO jeu(NomJeu, CreateurJeu, PlatformeJeu, DescJeu, DateSortie, CouvertureJeu, URLSite) 
        VALUES(:Nom, :Editeur, ".$plateformes.", :Desc ".$_POST['Sortie du jeu'].", :Couv, :URL )");
        
        $stmt->bindParam(':Nom', $_POST['Nom du jeu']);
        $stmt->bindParam(':Editeur', $_POST['Editeur du jeu']);
        $stmt->bindParam(':Desc', $_POST['DescJeu']);
        $stmt->bindParam(':Couv', $_POST['CouvertureJeu']);
        $stmt->bindParam(':URL', $_POST['URLSite']);
        $stmt->execute();

        $stmt2=$this->db->prepare("INSERT INTO bibliotheque(Id, UtiNomJeu) 
        VALUES( ".$_SESSION["id"].", :Nom)");
        
        $stmt2->bindParam(':Nom', $_POST['Nom du jeu']);
        $stmt2->execute();

=======
    public function addresseMailLibre($mail){
        $stmt=$this->db->prepare("SELECT IdUti FROM utilisateur WHERE EmailUti LIKE :mail;");
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        $nbRow=$stmt->rowCount();
        return $nbRow;
    }

    public function insereUtilisateur($nom,$prenom,$mail,$mdp){
        $stmt=$this->db->prepare("INSERT INTO utilisateur(NomUti,PrenUti,EmailUti,MDPUti) VALUES (:prenom,:nom,:mail,:mdp)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':mdp', password_hash($mdp,PASSWORD_DEFAULT));
        $stmt->execute();
>>>>>>> Stashed changes
    }
}

class User{
    private $idUti;
    private $nomUti;
    private $prenUti;
    private $emailUti;


    public function __construct($idUti) {
        $env = parse_ini_file('.env', true);
        $hostname =  $env['DB_HOST'];
        $dbname = $env['DB_NAME'];
        $username = $env['DB_USER'];
        $password = $env['DB_PASSWORD'];

        $conn = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8;", $username, $password);

        $selectStmt = $conn->prepare("SELECT * FROM utilisateur WHERE IdUti = :idUti;");
        $selectStmt->bindParam(':idUti', $idUti);
        $selectStmt->execute();
        $selectStmt->setFetchMode(PDO::FETCH_ASSOC);

        $val=$selectStmt->fetch(PDO::FETCH_ASSOC);
        
        $this->idUti = $val['IdUti'];
        $this->nomUti = $val['NomUti'];
        $this->prenUti = $val['PrenUti'];
        $this->emailUti = $val['EmailUti'];
        
    }

    public function getNomUti(){
        return $this->nomUti;
    }
    public function getPrenomUti(){
        return $this->prenUti;
    }
    public function getEmailUti(){
        return $this->emailUti;
    }
    public function getIdUti(){
        return $this->emailUti;
    }
    

}

class Jeu{

    private $nomJeu;
    private $editeurJeu;
    private $dateSortieJeu;
    private $plateformes;
    private $descriptionJeu;
    private $urlCover;
    private $urlSite;

    public function __construct($nomJeu, $editeurJeu, $dateSortieJeu, $plateformes, $descriptionJeu, $urlCover, $urlSite) {
        $this->nomJeu = $nomJeu;
        $this->editeurJeu = $editeurJeu;
        $this->dateSortieJeu = $dateSortieJeu;
        $this->plateformes = $plateformes;
        $this->descriptionJeu = $descriptionJeu;
        $this->urlCover = $urlCover;
        $this->urlSite = $urlSite;
    }
    //TODO: getters, setters? , potentielles autres fonctions de la classe
}

?>