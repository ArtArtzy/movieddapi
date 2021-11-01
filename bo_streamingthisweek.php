<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$currentW=$_POST['currentW'];
$sql="SELECT SUM(view) as s1 FROM viewmovie where week=".$currentW ;
$result  = $db->query($sql)->fetchAll();
$v1=$result[0][0];
$sql2="SELECT SUM(view) as s2 FROM viewseries where week=".$currentW;
$result2=$db->query($sql2)->fetchAll();
$v2=$result2[0][0];
echo $v1+$v2;
?>