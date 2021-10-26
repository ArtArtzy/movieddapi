<?php
// ใช้เพื่อหาจำนวน page ที่มีทั้งหมดของ movie
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$result = $db->select("reportproblemmovieetc","*",[
    "movieid"=>$id,
    "solve"=>0
]);
echo json_encode($result);
?>