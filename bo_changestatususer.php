<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id=$_POST['id'];
$status=$_POST['status'];
$db->update("user",[
    "status"=>$status
],["id"=>$id]);
?>
