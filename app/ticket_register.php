<?php
include_once  __DIR__.'/../config/config.php';
session_start();
if(isset($_SESSION["user_id"])){
    $userId = $_SESSION["user_id"];
}else{
    header("Location: ../login.html");
    exit();
}
$plates = $_POST['plates'];
$description = $_POST['description'];
$time = $_POST['time'].':00';
$date = $_POST['date'];

$startDate = DateTime::createFromFormat('Y-m-d H:i:s', $date.' '.$time)->format('Y-m-d H:i:s');
$dateTime = New DateTime($startDate, new DateTimeZone('Europe/Warsaw'));
$endDate = $dateTime->add(new DateInterval("PT30M"));
$endDate = $endDate->format('Y-m-d H:i:s');
$dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";port=3306";
$pdo = new PDO($dsn, DBUSER, DBPWD);
    $res = $pdo->exec("INSERT INTO tickets (plates, user_id, description , start, end) VALUES ('$plates', $userId, '$description', '$startDate', '$endDate');");
$pdo = null;
if($res){
    $_SESSION['register_ticket'] = 'Udało się zarejestrować zgłoszenie!';
}else{
    $_SESSION['register_ticket'] = 'Nie udało się zarejestrować zgłoszeniea:) Spróbuj niedługo ponownie';
}
header("Location: ../panel.html");
exit();
