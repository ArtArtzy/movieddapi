<?php
require_once('connection.php');
$result=$db->select("user","*");
echo json_encode($result);
?>
