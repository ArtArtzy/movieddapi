<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$db->update("movie",[
    "poster"=>0
], [
    "id"=>$id
]);

$fileName = "poster/movie/" . $id . ".jpg";
unlink($fileName);

?>