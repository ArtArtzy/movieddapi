<?php
// ใช้เพื่อหาจำนวน page ที่มีทั้งหมดของ movie
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$episodeid = $_POST['episodeid'];
$type = $_POST['type'];

$db->update("reportproblemseries",[
    "solved"=>1
],[
    "episodeid"=>$episodeid,
    "type"=>$type
]);
?>