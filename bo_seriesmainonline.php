<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$status = $_POST['status'];
$id = $_POST['id'];
$db->update("series",[
    "status"=>$status
],[
    "id"=>$id
]);
?>