<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$userid=$_POST['userid'];
$password=$_POST['password'];
$newphone=$_POST['newphone'];

$sql="select password from user where id=" . $userid;
$result  = $db->query($sql)->fetchAll();
if(sizeof($result)>0){
    if($password==$result[0]['password']){
        echo "Password correct";
    }
    else{
        echo "Password incorrect";
    }
}
else{
    echo    "No user in data";
}
?>