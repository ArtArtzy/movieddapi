<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id= $_POST['id'];
$db->delete("movie",[
    "id"=>$id
]);
// ลบรูปใน poster 
$path = "poster/movie/" . $id . ".jpg";
if(file_exists($path)){
    unlink($path);
}
//ลบรูปใน promotion
$path = "promotion/movie/" . $id . "m.jpg";

if(file_exists($path)){
    unlink($path);
}
$path = "promotion/movie/" . $id . "p.jpg";
if(file_exists($path)){
    unlink($path);
}

$path = "promotion/movie/" . $id . "t.jpg";
if(file_exists($path)){
    unlink($path);
}
?>