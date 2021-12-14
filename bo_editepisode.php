<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$orderid=$_POST['orderid'];
$name=$_POST['name'];
$durationHour=$_POST['durationHour'];
$durationMin=$_POST['durationMin'];
$movieCodeEng=$_POST['movieCodeEng'];
$movieCodeTh=$_POST['movieCodeTh'];
$id=$_POST['id'];
$db->update("episode",[
    "orderid"=>$orderid,
    "name"=>$name,
    "durationHour"=>$durationHour,
    "durationMin"=>$durationMin,
    "movieCodeEng"=>$movieCodeEng,
    "movieCodeTh"=>$movieCodeTh
],["id"=>$id]);

?>