<?php
// ใช้เพื่อหาจำนวน page ที่มีทั้งหมดของ movie
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$type = $_POST['type'];
$id = $_POST['movieid'];
$result = $db->select("reportproblemmovieetc","*",[
    "movieid"=>$id,
    "solve"=>0,
    "type"=>$type
]);
if(sizeof($result)>0){
    echo json_encode($result);
} else {
    echo "no data";
}

?>