<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$code=$_POST['code'];
$db->update("securitycode",[
    "code"=>$code],[
        "id"=>1]);

?>