<?php
include_once  __DIR__.'/../config/config.php';
require_once __DIR__ . '/../vendor/autoload.php';

//var_dump(__DIR__.'/../config/config.php);exit;
$name = $_POST['name'];
$surname = $_POST['surname'];
$pesel = $_POST['pesel'];
$nip = $_POST['nip'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$description = $_POST['description'];
$dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";port=3306";
//var_dump($dsn);exit;
//try {
$dbh = new PDO($dsn, DBUSER, DBPWD);
//    $conn = mysqli_connect($dsn, DBUSER, DBPWD);
//var_dump($conn);exit;
//    if (!$conn) {
//        die("Connection failed: " . mysqli_connect_error());
//    }
//    echo "Connected successfully";
//var_dump($dbh);exit;
//var_dump($dsn, DBUSER, DBPWD);exit;
//$dbh->prepare("INSERT INTO users (name, surname, pesel, nip, email, phone, password, description) VALUES (?,?,?,?,?,?,?,?);")
//    var_dump($dbh);exit;
$dbh->exec( "INSERT INTO users (name, surname, pesel, nip, email, phone, password, description) VALUES ($name, $surname, $pesel, $nip, $email, $phone, $password, $description);" );
//} catch (PDOException $e) {
//    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
//    exit;
//}
//var_dump($dbh->exec( "INSERT INTO users (name, surname, pesel, nip, email, phone, password, description) VALUES ($name, $surname, $pesel, $nip, $email, $phone, $password, $description);" ));exit;
//var_dump($lol);exit;
