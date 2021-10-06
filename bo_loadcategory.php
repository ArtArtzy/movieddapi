<?php
require_once('connection.php');
$result=$db->select("category","*");
echo json_encode($result);
?>
