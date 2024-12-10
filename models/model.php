<?php
class ModelArticle{
    private $db;

    public function __construct() {
        $env = parse_ini_file('.env', true);

        $hostname =  $env['DB_HOST'];
        $dbname = $env['DB_NAME'];
        $username = $env['DB_USER'];
        $password = $env['DB_PASSWORD'];

        $this->db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8;", $username, $password);
    }
}
