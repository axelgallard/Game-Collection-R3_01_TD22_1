<?php
class ModelArticle{
    private $db;

    public function __construct() {
        $hostname = 'localhost'; 
        $dbname = 'td_final'; 
        $username = 'root'; 
        $password=null;

        $this->db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8;", $username, $password);
    }
}
