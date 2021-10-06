<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$us_id = $_POST['us_id'];
$db->delete("usersystem",["us_id"=>$us_id]);
?>
<!-- ลบ ผู้ดูแลใน usersystem -->