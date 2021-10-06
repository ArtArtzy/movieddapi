<?php
require_once('connection.php');
$result=$db->select("ads","*");
echo json_encode($result);
?>
