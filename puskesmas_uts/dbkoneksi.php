<?php
$host = 'localhost';
$dbname = 'dbpuskesmas3';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname";

$dbh = new PDO($dsn, $username, $password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>