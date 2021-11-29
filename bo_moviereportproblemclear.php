<?php
// ใช้เพื่อหาจำนวน page ที่มีทั้งหมดของ movie
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['movieid'];
$type = $_POST['type'];
if($type == 2){
$db->update("movie",[
    "alertThaiSub"=>0
], [
    "id"=>$id
]);
} else {
    $db->update("movie",[
        "alertThaiSound"=>0
    ], [
        "id"=>$id
    ]); 
}
?>