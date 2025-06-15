<?php
    $host = "localhost";
    $dbname = "db_puskesmas";
    $username = "root";
    $password = "";

    $dsn = "mysql:host=$host;dbname=$dbname";

    $dbh = new PDO($dsn, $username, $password);
?>