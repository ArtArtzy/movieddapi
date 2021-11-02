<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id= $_POST['id'];
$month = date("m");
$year = date("Y");
$result = $db->select("movie","*",[
    "id"=>$id
]);

if(strlen($result[0]['movieCodeEng']) !=0){
    $db->insert("deletedmovie",[
        "title"=>$result[0]['nameEng'],
        "movieCode"=>$result[0]['movieCodeEng'],
        "type"=>2,
        "month"=>$month,
        "year"=>$year
    ]);
}
if(strlen($result[0]['movieCodeTh']) !=0){
    $db->insert("deletedmovie",[
        "title"=>$result[0]['nameEng'],
        "movieCode"=>$result[0]['movieCodeTh'],
        "type"=>1,
        "month"=>$month,
        "year"=>$year
    ]);
}
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