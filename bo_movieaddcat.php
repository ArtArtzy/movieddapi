<?php
//************Not use it */
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$catid = $_POST['catid'];
$db->update("category",[
"movie[+]"=>1
],[
"id"=>$catid
]);

?>