<?php
include_once  __DIR__.'/../config/config.php';
session_start();

$verification_data = $_POST['verification_data'];
$password = $_POST['password'];
$rememberMe = isset($_POST['rememberMe'])? $_POST['rememberMe']: null;
$dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";port=3306";
$pdo = new PDO($dsn, DBUSER, DBPWD);
if(strstr($verification_data, '@') ) {
    $queryResult = $pdo->query("SELECT id, name, surname, email, password FROM users where email = '$verification_data' LIMIT 1");
}else{
    $queryResult = $pdo->query("SELECT id, name, surname, email, password FROM users where phone = '$verification_data' LIMIT 1");
}
$user = $queryResult->fetch();
$pdo = null;
if($user && password_verify($password, $user['password'])){
    $_SESSION["login"] = $user['name'].' '.$user['surname'];
    $_SESSION["user_id"] = $user['id'];

    if($rememberMe){
        setcookie('LOGIN_DATA', $verification_data.';'.$user['password'], time()+60*60*24*30, '/');
    }
    header("Location: ../panel.html");
    exit();
    unset($_SESSION["wrong_login"]);
}else{
    $_SESSION["wrong_login"] = 'Nie ma użytkownika o takich danych';
    header("Location: ../login.html");
    exit();
}
