<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
// $id=17;
$result = $db->select("episode","*",[
    "id"=>$id
]);
$episodeName = $result[0]['name'];
$seriesid = $result[0]['seriesid'];
$seasonid = $result[0]['seasonid'];
$movieCodeEng = $result[0]['movieCodeEng'];
$movieCodeTh = $result[0]['movieCodeTh'];
echo $movieCodeEng;
echo $movieCodeTh;
$result2 = $db->select("season","*",[
    "id"=>$seasonid
]);
$seasonName = $result2[0]['name'];
$result3 = $db->select("series","*",[
"id"=>$seriesid
]);
$seriesName = $result3[0]['nameEng'];
$month = date("m");
$year = date("Y");
if(strlen($movieCodeEng)>0){
   $db->insert("deletedseries",[
    "seriesName"=>$seriesName,
    "seasonName"=>$seasonName,
    "episodeName"=>$episodeName,
    "movieCode"=>$movieCodeEng,
    "month"=>$month,
    "year"=>$year,
    "status"=>0
   ]) ;
}

if(strlen($movieCodeTh)>0){
    $db->insert("deletedseries",[
     "seriesName"=>$seriesName,
     "seasonName"=>$seasonName,
     "episodeName"=>$episodeName,
     "movieCode"=>$movieCodeTh,
     "month"=>$month,
     "year"=>$year,
     "status"=>0
    ]) ;
 }

$db->delete("episode",["id"=>$id]);
?>
