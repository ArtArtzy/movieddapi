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
    $sql = "select * from series limit " . $pagestart . " , " . "10";
} else {
    $sql = "select * from series where  type like '%[" .  $cat . "]%' limit ". $pagestart . " , " . "10";
}
$result  = $db->query($sql)->fetchAll();
echo json_encode($result);
?> 