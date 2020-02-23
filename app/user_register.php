<?php
include_once  __DIR__.'/../config/config.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$pesel = $_POST['pesel'];
$nip = $_POST['nip'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$description = $_POST['description'];
$dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";port=3306";
$pdo = new PDO($dsn, DBUSER, DBPWD);
$pdo->exec( "INSERT INTO users (name, surname, pesel, nip, email, phone, password, description) VALUES ('$name', '$surname', '$pesel', '$nip', '$email', '$phone', '$password', '$description');" );
$pdo = null;
