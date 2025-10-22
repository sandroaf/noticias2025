<?php
    $host = "localhost";
    $dbname = "noticias";
    $dbuser = "root";
    $dbpassword = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$dbuser,$dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "ERRO na conxão com o Banco de Dados: ".$e->getMessage();
    }

?>