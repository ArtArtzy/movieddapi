<?php
require_once('connection.php');
$result=$db->select("usersystem","*");
echo json_encode($result);
?>