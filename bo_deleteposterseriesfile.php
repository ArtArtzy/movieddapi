<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$id=3;
$fileName = "poster/series/" . $id . ".jpg";
unlink($fileName);
$db->update("series",[
    "poster"=>0
], [
    "id"=>$id
]);

?>