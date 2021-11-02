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
$expiredate = $_POST['expiredDate'];
$id= $_POST['id'];

$result  = $db->select("movie","*",[
"id"=>$id
]);
$typeOld = $result[0]['type'];
$typeOld = explode(",",$typeOld);
for($i=0;$i<sizeof($typeOld);$i++){
    $datax =str_replace("[","",$typeOld[$i]);
    $datax = str_replace("]","",$datax);
    $db->update("category",["movie[-]"=>1],["id"=>$datax]);
}

$typeNew = explode(",",$type);
for($i=0;$i<sizeof($typeNew);$i++){
    $datax =str_replace("[","",$typeNew[$i]);
    $datax = str_replace("]","",$datax);
    $db->update("category",["movie[+]"=>1],["id"=>$datax]);
}

$db->update("movie",[
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
    "expireddate"=>$expiredate
],[
    "id"=>$id
]);

?>