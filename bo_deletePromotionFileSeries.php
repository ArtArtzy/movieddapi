<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id=$_POST['id'];
$type = $_POST['type'];
unlink("promotion/series/" . $id . $type . ".jpg");
if($type == 'm'){
    $db->update("series",[
        "promotionMobilePic"=>0
    ],[
        "id"=>$id
    ]);
} elseif($type == 't'){
    $db->update("series",[
        "promotionTabletPic"=>0
    ],[
        "id"=>$id
    ]);
} elseif($type == 'p'){
    $db->update("series",[
        "promotionPCPic"=>0
    ],[
        "id"=>$id
    ]);
}


?>