<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$at_title=$_POST['at_title'];
$at_weight=$_POST['at_weight'];
$at_target=$_POST['at_target'];
$at_folder=$_POST['at_folder'];
$result=$db->select("ads","*",["at_title"=>$at_title]);
if(sizeof($result)>0) {
    echo "NR";
    return;
}
$result=$db->select("ads","*",["at_folder"=>$at_folder]);
if(sizeof($result)>0) {
    echo "NRF";
    return;
}
$db->insert("ads",[
    "at_title"=>$at_title,
    "at_weight"=>$at_weight,
    "at_target"=>$at_target,
    "at_folder"=>$at_folder

]);
echo "OK";