<?php
// ใช้เพื่อหาจำนวน page ที่มีทั้งหมดของ movie
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$movieid = $_POST['movieid'];
$value = $_POST['value'];
$db->update("series",[  
    "promotion"=>$value
],["id"=>$movieid,]);
?>