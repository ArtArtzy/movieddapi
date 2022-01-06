<?php
// แสดงข้อมูลเป็นหน้า
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$catName = $_POST['catName'];
if($catName == 0 ){
$sql = "select count(id) as c from series";
} else {
    $sql = "select count(id) as c from series where  type like '%[" .  $catName . "]%' ";
}


$result  = $db->query($sql)->fetchAll();
echo $result[0]['c'];
?>