<?php
// แสดงข้อมูลเป็นหน้า
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$sql = "Select count(episode.orderid), season.orderid, season.name from episode inner join season on episode.seasonid = season.id where episode.seriesid = " . $id . " group by seasonid order by season.orderid";
$result  = $db->query($sql)->fetchAll();
$resultFinal = array();
for($i=0;$i<sizeof($result);$i++){   array_push($resultFinal,$result[$i][0]);
}

$updateText =  implode(",",$resultFinal);

$db->update("series",[
  "episode" =>$updateText 
],[
    "id"=> $id
]);
?>