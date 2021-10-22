<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id= $_POST['id'];
$result = $db->select("season","*",["seriesid"=>$id]);
if(sizeof($result) == 0){
    $result = 0;
    echo $result;
} else {
    echo json_encode($result);
}

?>