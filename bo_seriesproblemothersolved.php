<?php
// ใช้เพื่อหาจำนวน page ที่มีทั้งหมดของ movie
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$problemid = $_POST['problemid'];
$db->update("reportproblemseriesetc",[
    "solved"=>1
],[
    "id"=>$problemid
]);
echo "finish";
?>