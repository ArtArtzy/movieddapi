<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$at_id=$_POST['at_id'];
$status=$_POST['status'];
$db->update("ads",[
    "status"=>$status
],["at_id"=>$at_id]);
?>
