<?php
require_once('connection.php');
$result=$db->select("viewads","*");
echo json_encode($result);
?>
