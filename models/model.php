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
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

class User{
     public $idUti;
     public $nomUti;
     public $prenUti;
     public $emailUti;


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
?>