<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$orderid=$_POST['orderid'];
$name=$_POST['name'];
$durationHour=$_POST['durationHour'];
$durationMin=$_POST['durationMin'];
$movieCodeEng=$_POST['movieCodeEng'];
$movieCodeTh=$_POST['movieCodeTh'];
$id=$_POST['id'];
$db->update("seriessub",[
    "orderid"=>$orderid,
    "name"=>$name,
    "durationHour"=>$durationHour,
    "durationMin"=>$durationMin,
    "movieCodeEng"=>$movieCodeEng,
    "movieCodeTh"=>$movieCodeTh
],["id"=>$id]);
//$result=$db->select("seriessub","*",["seriesid"=>$seriesid,"seasonid"=>$seasonid]);

// if($name==$result[0]["name"]){
//     if($orderid==$result[0]["orderid"]){
//         echo "notchange";
//     }else{
//         $result2=$db->select("seriessub","*",["seriesid"=>$seriesid,"seasonid"=>$seasonid]);
//         if(sizeof($result2)>0){
//             echo "order id exist";
//         }
//         else{
//             $db->update("seriessub",[

//                 "orderid"=>$orderid

//             ],["id"=>$result[0]["id"]);
//             echo "OK";
//         }
//     }
// }
?>