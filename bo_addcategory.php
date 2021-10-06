<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$orderid=$_POST['orderid'];
$catname=$_POST['catname'];
$movie=$_POST['movie'];
$series=$_POST['series'];
$status=$_POST['status'];
$result=$db->select("category","*",["orderid"=>$orderid]);
if(sizeof($result)>0) {
    echo "NR";
    return;
}
$result=$db->select("category","*",["catname"=>$catname]);
if(sizeof($result)>0) {
    echo "NRC";
    return;
}
$db->insert("category",[
    "orderid"=>$orderid,
    "catname"=>$catname,
    "movie"=>$movie,
    "series"=>$series,
    "status"=>$status
]);