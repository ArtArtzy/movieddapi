<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$nameEng = $_POST['nameEng'];
$nameTh = $_POST['nameTh'];
$year = $_POST['year'];
$mparate = $_POST['mparate'];
$type = $_POST['type'];
$synopsis = $_POST['synopsis'];
$trailerCode = $_POST['trailerCode'];
$netflix = $_POST['netflix'];
$disney = $_POST['disney'];
$amazon = $_POST['amazon'];
$hbo = $_POST['hbo'];
$new = $_POST['new'];
$expiredate = $_POST['expiredate'];
$id= $_POST['id'];

$db->update("series",[
    "nameEng"=>$nameEng,
    "nameTh"=>$nameTh,
    "year"=>$year,
    "mparate"=>$mparate,
    "type"=>$type,
    "poster"=>1,
    "synopsis"=>$synopsis,
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