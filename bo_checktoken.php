<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$token = $_POST['token'];
$result  = $db->select("usersystem","*",[
    "token"=>$token
]);
if(sizeof($result) == 1){
    echo json_encode($result);
} else {
    echo "logout";
}