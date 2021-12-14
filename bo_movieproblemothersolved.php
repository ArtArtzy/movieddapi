<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$movieid = $_POST['movieid'];
$id = $_POST['id'];
$type = $_POST['type'];
$db->update("reportproblemmovieetc",[
    "solve"=>1
],[
    "movieid"=>$movieid,
    "id"=>$id,
    "type"=>$type
]);
echo "complete";
?>