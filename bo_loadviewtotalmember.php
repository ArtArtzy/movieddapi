<?php
require_once('connection.php');
$result=$db->select("viewuser","*");
echo json_encode($result);
?>
