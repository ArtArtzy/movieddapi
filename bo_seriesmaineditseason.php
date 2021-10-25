<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$orderid = $_POST['orderid'];
$seriesid = $_POST['seriesid'];
$name = $_POST['name'];

$db->update("season",[
"seriesid"=>$seriesid,
"orderid"=>$orderid,
"name"=>$name
],[
    "id"=>$id
]);

?>