<?php
// ใช้เพื่อหาจำนวน page ที่มีทั้งหมดของ movie
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$sql = "select * from viewuserstreaming where userid = ". $id .  " order by id desc";
$result  = $db->query($sql)->fetchAll();
echo json_encode($result);
?>