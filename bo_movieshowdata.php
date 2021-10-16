<?php
// แสดงข้อมูลเป็นหน้า
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$cat= $_POST['catName'];
$page = $_POST["pagedata"];
$pagestart = ($page-1)*10;
// echo $pagestart;
$pageend = ($page)*10;
if($cat == 0){
    $sql = "select * from movie limit " . $pagestart . " , " . $pageend;
} else {
    $sql = "select * from movie where  type like '%[" .  $cat . "]%' limit ". $pagestart . " , " . $pageend;
}
$result  = $db->query($sql)->fetchAll();
echo json_encode($result);
?> 