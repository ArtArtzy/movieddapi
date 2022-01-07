<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$value = $_POST['value'];
$id = $_POST['id'];
$db->update("deletedseries",[
    "status"=>$value
],[
    "id"=>$id
]);
?>