<?php
// ใช้เพื่อหาจำนวน page ที่มีทั้งหมดของ movie
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$value = $_POST['value'];
$id = $_POST['id'];
$db->update("deletedmovie",[
    "status"=>$value
],[
    "id"=>$id
]);
?>