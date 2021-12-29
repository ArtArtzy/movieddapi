<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$seriesid=$_POST['seriesid'];
$seasonid=$_POST['seasonid'];
$orderid=$_POST['orderid'];
$name=$_POST['name'];
$durationHour=$_POST['durationHour'];
$durationMin=$_POST['durationMin'];
$movieCodeEng=$_POST['movieCodeEng'];
$movieCodeTh=$_POST['movieCodeTh'];
$seriesid = 4;
//ทำการหา episode ทั้งหมด
$sql = "select seasonid, count(seriesid) as count1 from episode where seriesid =" . $seriesid . " group by seasonid";
$result  = $db->query($sql)->fetchAll();


for($i=0;$i<sizeof($result);$i++){
    $result2 = $db->select("season","*",[
        "id"=>$result[$i]['seasonid']
    ]);
    $result[$i]['seasonName']= $result2[0]['name'];  
    $result[$i]['orderid']= $result2[0]['orderid'];
}
print_r($result);
usort($result,function($first,$second){
    return $first->orderid < $second->orderid;
});
print_r($result);
return;

$db->insert("episode",[
    "seriesid"=>$seriesid,
    "seasonid"=>$seasonid,
    "orderid"=>$orderid,
    "name"=>$name,
    "durationHour"=>$durationHour,
    "durationMin"=>$durationMin,
    "movieCodeEng"=>$movieCodeEng,
    "movieCodeTh"=>$movieCodeTh
]);
?>