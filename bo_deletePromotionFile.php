<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id=$_POST['id'];
$type = $_POST['type'];
unlink("promotion/movie/" . $id . $type . ".jpg");
if($type == 'm'){
    $db->update("movie",[
        "promotionMobilePic"=>0
    ],[
        "id"=>$id
    ]);
} elseif($type == 't'){
    $db->update("movie",[
        "promotionTabletPic"=>0
    ],[
        "id"=>$id
    ]);
} elseif($type == 'p'){
    $db->update("movie",[
        "promotionPCPic"=>0
    ],[
        "id"=>$id
    ]);
}


?>