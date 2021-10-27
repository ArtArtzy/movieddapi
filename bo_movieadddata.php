<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$nameEng = $_POST['nameEng'];
$nameTh = $_POST['nameTh'];
$year = $_POST['year'];
$mparate = $_POST['mparate'];
$durationHour = $_POST['durationHour'];
$durationMin = $_POST['durationMin'];
$type = $_POST['type'];
$synopsis = $_POST['synopsis'];
$movieCodeEng = $_POST['movieCodeEng'];
$movieCodeTh = $_POST['movieCodeTh'];
$trailerCode = $_POST['trailerCode'];
$netflix = $_POST['netflix'];
$disney = $_POST['disney'];
$amazon = $_POST['amazon'];
$hbo = $_POST['hbo'];
$new = $_POST['new'];
$expireddate = $_POST['expiredDate'];
$timestamp = date("U");
$db->insert("movie",[
    "nameEng"=>$nameEng,
    "nameTh"=>$nameTh,
    "year"=>$year,
    "mparate"=>$mparate,
    "durationHour"=>$durationHour,
    "durationMin"=>$durationMin,
    "type"=>$type,
    "poster"=>1,
    "synopsis"=>$synopsis,
    "movieCodeEng"=>$movieCodeEng,
    "movieCodeTh"=>$movieCodeTh,
    "trailerCode"=>$trailerCode,
    "netflix"=>$netflix,
    "disney"=>$disney,
    "amazon"=>$amazon,
    "hbo"=>$hbo,
    "new"=>$new,
    "expireddate"=>$expireddate,
    "timestamp"=>$timestamp
]);
echo $db->id();
?>