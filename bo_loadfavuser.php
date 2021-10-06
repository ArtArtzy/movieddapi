<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$catid=$_POST['catid'];
$result=$db->select("category","*",["id"=>$catid]);
if(sizeof($result)==0){
    echo "";
}
else{
    echo $result[0]["catname"];
}
?>