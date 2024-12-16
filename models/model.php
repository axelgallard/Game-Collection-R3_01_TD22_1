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
    int $idUti;
    String $nomUti;
    String $prenUti;
    String $emailUti;


    public function __construct(idUti) {
        $selectStmt = $conn->prepare("SELECT * FROM utilisateur WHERE IdUti = :idUti;");
        $selectStmt->bindParam(':idUti', idUti);
        $selectStmt->execute();
        $selectStmt->setFetchMode(PDO::FETCH_ASSOC);

        $val=$resultat->fetch(PDO::FETCH_ASSOC);

        $idUti = $val['IdUti'];
        $nomUti = $val['NomUti'];
        $prenUti = $val['PrenUti']
        $emailUti = $val['EmailUti']
        
    }
}
?>