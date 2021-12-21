<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$userid=$_POST['userId'];
$oldpassword=$_POST['oldPassword'];
$newpassword=$_POST['newPassword'];

$sql="select * from user where id=" . $userid . " and password='" . $oldpassword . "'";
$result  = $db->query($sql)->fetchAll();
if(sizeof($result)==0){
    echo "fail";
}
else{
    $sql="update user set password='" . $newpassword . "' where id=" . $userid  ;
    $db->query($sql)->fetchAll();
    echo "finish";
}
?>