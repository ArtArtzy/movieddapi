<?php
require_once('connection.php');
require_once('func_changecatname.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$id=$_POST['id'];
$id=48;

$result=$db->select("movie","*",[
    "id"=>$id
]);

$result[0]['type']=convertCatname($result[0]['type'],$db);

 
echo json_encode($result);
?>