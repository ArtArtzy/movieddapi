<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$userid=$_POST['userid'];
$fav=$_POST['fav'];
// $userid=37;
// $fav=['716','718','719'];

$favstr=implode(",",$fav);

$db->update("user",[
    "fav"=>$favstr
],[
    "id"=>$userid
]);
?>