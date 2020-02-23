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
//var_dump($_POST);exit;
$dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";port=3306";
$pdo = new PDO($dsn, DBUSER, DBPWD);
//var_dump($name, $userId, $description, $startDate, $endDate);exit;
//$startDate = '1990-03-02 02:02:00';
//$endDate = '1990-03-02 02:32:00';
try {
//    $pdo->exec("INSERT INTO tickets (plates, user_id, description) VALUES ('$plates', '$userId', '$description');");
    $pdo->exec("INSERT INTO tickets (plates, user_id, description , start, end) VALUES ('$plates', $userId, '$description', '$startDate', '$endDate');");
        var_dump($pdo->errorInfo());exit;

}catch(Exception $e){
    echo 'Exception -> ';
    var_dump($e->getMessage());
}
$pdo = null;
