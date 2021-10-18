<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$at_id=$_POST['at_id'];
$at_title=$_POST['at_title'];
$at_folder=$_POST['at_folder'];
$at_weight=$_POST['at_weight'];
$at_target=$_POST['at_target'];
$result=$db->select("ads","*",["id"=>$id]);
if($at_title==$result[0]["at_title"]){
    echo "Ads name exist";
}
else{
    $db->update("ads",[
        "at_title"=>$at_title,
        "at_folder"=>$at_folder,
        "at_weight"=>$at_weight,
        "at_target"=>$at_target
    ],[
        "at_id"=>$at_id
    ]);
    echo OK;
}
?>