<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$username = $_POST['username'];
$password = $_POST['password'];
$result = $db->select("usersystem","*",[
    "username"=>$username,
    "password"=>$password
]);
if(sizeof($result) == 0){
    echo "NR";
} else {
    echo json_encode($result);
}
?>
<!-- เช็ค  username ตอน login -->