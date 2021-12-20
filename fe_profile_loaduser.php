<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$userid=$_POST['userid'];
// $userid=19;

$sql="select telephone from user where id=" . $userid;
$result  = $db->query($sql)->fetchAll();
// echo $sql;

if(sizeof($result)>0){
    echo $result[0]['telephone'];
}
else{
    echo "fail";
}
?>