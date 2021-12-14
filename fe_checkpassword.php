<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$username=$_POST['username'];
$password=$_POST['password'];

// $username='R1';
// $password='1122';

$sql="select * from user where username='" . $username . "' and password='" . $password . "' and status=1";
// echo $sql; 

$result  = $db->query($sql)->fetchAll();
// print_r($result);
if(sizeof($result)==0){
    echo "fail";
}
else{
    echo json_encode($result);
}

?>