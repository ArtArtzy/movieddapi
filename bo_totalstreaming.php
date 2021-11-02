<?php
require_once('connection.php');
$sql="SELECT SUM(view) as s1 FROM viewmovietotal";
$result  = $db->query($sql)->fetchAll();
$v1=$result[0][0];
$sql2="SELECT SUM(view) as s2 FROM viewseriestotal";
$result2=$db->query($sql2)->fetchAll();
$v2=$result2[0][0];
echo $v1+$v2;
?>