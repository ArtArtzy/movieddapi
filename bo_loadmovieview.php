<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$result = $db->select("viewmovie","*",[
"movieid"=>$id
]);
echo json_encode($result);
?>