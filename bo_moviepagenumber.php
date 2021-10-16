<?php
// ใช้เพื่อหาจำนวน page ที่มีทั้งหมดของ movie
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$cat = $_POST["cat"];
if($cat != 0){
$sql = "select count(id) from movie where type like '%[" .  $cat . "]%'";
} else {
    $sql = "select count(id) from movie";
}
$numberofrecord  = $db->query($sql)->fetchAll();
echo ceil($numberofrecord[0][0]/10);
?>