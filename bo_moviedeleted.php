<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$month = $_POST['month'];
$year = $_POST['year'];
$result = $db->select("deletedmovie","*",[
"month"=>$month,
"year"=>$year
]);
echo json_encode($result);

?>