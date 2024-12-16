<?php
getPrenom(id)
    $env = parse_ini_file('.env', true);

        $hostname =  $env['DB_HOST'];
        $dbname = $env['DB_NAME'];
        $username = $env['DB_USER'];
        $password = $env['DB_PASSWORD'];

        db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8;", $username, $password);

        $selectStmt = $conn->prepare("SELECT PrenUti FROM utilisateur WHERE IdUti = ".id.";");
        $selectStmt->execute();
        $selectStmt->setFetchMode(PDO::FETCH_ASSOC);

        val=$resultat->fetch(PDO::FETCH_ASSOC);

        return $val['PrenUti'] 

}