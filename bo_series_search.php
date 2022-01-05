<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$searchtext=$_POST['searchtext'];
$catid=$_POST['catid'];
// $searchtext="T";
// $catid=0;

if($catid!=0){
$sql="select * from series where type like '%[" . $catid . "]%' and ( nameEng like '%" . $searchtext . "%' or nameTh like '%" . $searchtext . "%' )";
}
else{
    $sql="select * from series where  ( nameEng like '%" . $searchtext . "%' or nameTh like '%" . $searchtext . "%' )";
}
$result  = $db->query($sql)->fetchAll();
// echo $sql;
echo json_encode($result);
?>