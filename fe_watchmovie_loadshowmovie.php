<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$id=$_POST['id'];


// $result2=$db->select("category","*");

$result=$db->select("movie","*",[
    "id"=>$id
]);
echo json_encode($result);
?>