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
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($liste, new Jeu($row['NomJeu'], $row['CreateurJeu'], $row['DateSortie'], $row['PlateformeJeu'], $row['DescJeu'], $row['CouvertureJeu'], $row['URLSite'], $row['TempsJeu']));
        }
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
        $liste=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($liste, new Jeu($row['NomJeu'], $row['CreateurJeu'], $row['DateSortie'], $row['PlateformeJeu'], $row['DescJeu'], $row['CouvertureJeu'], $row['URLSite'], 0));
        }
        return $liste;
    }

    public function getLstJeuxByName($GameName){
        $stmt=$this->db->prepare("SELECT * FROM jeu WHERE NomJeu LIKE :Nom");
        $GameName = '%'.$GameName.'%';
        $stmt->bindParam(':Nom', $GameName);
        $stmt->execute();
        $liste=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($liste, new Jeu($row['NomJeu'], $row['CreateurJeu'], $row['DateSortie'], $row['PlateformeJeu'], $row['DescJeu'], $row['CouvertureJeu'], $row['URLSite'], 0));
        }
        return $liste;
    }

    public function ajoutForm($plateformes){
        $stmt=$this->db->prepare("INSERT INTO jeu(NomJeu, CreateurJeu, PlateformeJeu, DescJeu, DateSortie, CouvertureJeu, URLSite) 
        VALUES(:Nom, :Editeur, '".$plateformes."', :Desc, '".$_POST['SortieJeu']."', :Couv, :URL)");
        
        $stmt->bindParam(':Nom', $_POST['NomJeu']);
        $stmt->bindParam(':Editeur', $_POST['EditeurJeu']);
        $stmt->bindParam(':Desc', $_POST['DescJeu']);
        $stmt->bindParam(':Couv', $_POST['CouvertureJeu']);
        $stmt->bindParam(':URL', $_POST['URLSite']);
        $stmt->execute();

    }

    public function infoJeu($jeu) {
        $stmt=$this->db->prepare("SELECT * FROM bibliotheque INNER JOIN JEU ON bibliotheque.NomJeu=jeu.NomJeu WHERE bibliotheque.NomJeu LIKE :jeu AND IdUti = ".$_SESSION['id']."");
        $stmt->bindParam(':jeu', $jeu);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Jeu($row['NomJeu'], $row['CreateurJeu'], $row['DateSortie'], $row['PlateformeJeu'], $row['DescJeu'], $row['CouvertureJeu'], $row['URLSite'], $row['TempsJeu']);
    }

    public function ajoutJeuBibli($jeu){
        $stmt=$this->db->prepare("INSERT INTO bibliotheque (IdUti, NomJeu) VALUES (:id, :Nom)");
        
        $stmt->bindParam(':Nom', $jeu);
        $stmt->bindParam(':id', $_SESSION['id']);

        $stmt->execute();
    }

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
    }

    
    public function getClassementJeux(){
        $stmt=$this->db->prepare("SELECT utilisateur.NomUti,utilisateur.PrenUti,bibliotheque.NomJeu,bibliotheque.TempsJeu FROM bibliotheque INNER JOIN utilisateur ON utilisateur.IdUti=bibliotheque.IdUti ORDER BY bibliotheque.TempsJeu DESC");
        $stmt->execute();
        return $stmt;
    }

    public function setInfoUti($id,$nom,$prenom,$mail){
        $stmt=$this->db->prepare("UPDATE utilisateur SET NomUti=:nom,PrenUti=:prenom,EmailUti=:mail WHERE IdUti=:id;");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function setMdpUti($id,$mdp){
        $stmt=$this->db->prepare("UPDATE utilisateur SET MDPUti=:mdp WHERE IdUti=:id;");
        $stmt->bindParam(':mdp', password_hash($mdp,PASSWORD_DEFAULT));
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function supprimeUti($id){
        $stmt=$this->db->prepare("DELETE FROM utilisateur WHERE IdUti=:id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function SupBibli($jeu) {
        $stmt=$this->db->prepare("DELETE FROM bibliotheque WHERE NomJeu LIKE :jeu AND IdUti = ".$_SESSION['id']."");
        $stmt->bindParam(':jeu', $jeu);
        $stmt->execute();
    }

    public function ModifTemps($temps, $jeu){
        $stmt=$this->db->prepare("UPDATE bibliotheque SET TempsJeu = :temps WHERE NomJeu LIKE :jeu AND IdUti = ".$_SESSION['id']."");
        $stmt->bindParam(':jeu', $jeu);
        $stmt->bindParam(':temps', $temps);
        $stmt->execute();
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
        return $this->idUti;
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
    private $tempsJeu;

    public function __construct($nomJeu, $editeurJeu, $dateSortieJeu, $plateformes, $descriptionJeu, $urlCover, $urlSite, $tempsJeu) {
        $this->nomJeu = $nomJeu;
        $this->editeurJeu = $editeurJeu;
        $this->dateSortieJeu = $dateSortieJeu;
        $this->plateformes = $plateformes;
        $this->descriptionJeu = $descriptionJeu;
        $this->urlCover = $urlCover;
        $this->urlSite = $urlSite;
        $this->tempsJeu = $tempsJeu;
    }

    public function getNomJeu()
    {
        return $this->nomJeu;
    }

    public function getEditeurJeu()
    {
        return $this->editeurJeu;
    }

    public function getDateSortieJeu()
    {
        return $this->dateSortieJeu;
    }

    public function getPlateformes()
    {
        return $this->plateformes;
    }

    public function getDescriptionJeu()
    {
        return $this->descriptionJeu;
    }

    public function getUrlCover()
    {
        return $this->urlCover;
    }

    public function getUrlSite()
    {
        return $this->urlSite;
    }

    public function getTempsJeu()
    {
        return $this->tempsJeu;
    }
}

?>