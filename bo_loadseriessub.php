<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$seriesid = $_POST['seriesid'];
$seasonid = $_POST['seasonid'];
$result=$db->select("episode","*",[
    "seriesid"=>$seriesid,
    "seasonid"=>$seasonid
]);
echo json_encode($result);
?>