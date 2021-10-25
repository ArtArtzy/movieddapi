<?php
require_once('connection.php');
$result=$db->select("securitycode","code",[
    "id"=>1]);
echo $result[0];
?>