<?php
include_once  __DIR__.'/../config/config.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$pesel = $_POST['pesel'];
$nip = $_POST['nip'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$description = $_POST['description'];
$dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";port=3306";
$dbh = new PDO($dsn, DBUSER, DBPWD);
$dbh->exec( "INSERT INTO users (name, surname, pesel, nip, email, phone, password, description) VALUES ('$name', '$surname', '$pesel', '$nip', '$email', '$phone', '$password', '$description');" );
