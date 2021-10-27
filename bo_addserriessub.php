<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$seriesid=$_POST['seriesid'];
$seasonid=$_POST['seasonid'];
$orderid=$_POST['orderid'];
$name=$_POST['name'];
$durationHour=$_POST['durationHour'];
$durationMin=$_POST['durationMin'];
$movieCodeEng=$_POST['movieCodeEng'];
$movieCodeTh=$_POST['movieCodeTh'];

$db->insert("seriessub",[
    "seriesid"=>$seriesid,
    "seasonid"=>$seasonid,
    "orderid"=>$orderid,
    "name"=>$name,
    "durationHour"=>$durationHour,
    "durationMin"=>$durationMin,
    "movieCodeEng"=>$movieCodeEng,
    "movieCodeTh"=>$movieCodeTh
]);
?>