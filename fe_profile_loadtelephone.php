<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$userid=$_POST['userid'];
$userid=18;

$sql="select telephone from user where id=" . $userid;
$result  = $db->query($sql)->fetchAll();
// echo $sql;

if(sizeof($result)>0){
    // echo $result[0]['telephone'];
    $sendPhone=substr($result[0]['telephone'],0,3). '-' . substr($result[0]['telephone'],3,3) . '-' .substr($result[0]['telephone'],6,4);
    echo $sendPhone;
}
else{
    echo "fail";
}
?>