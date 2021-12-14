<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$type = $_POST['type'];
$db->update("reportproblemmovie",[
    "solved"=>1
],[
    "movieid"=>$id,
    "type"=>$type
]);
echo "complete";
?>