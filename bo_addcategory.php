<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$orderid=$_POST['orderid'];
$catname=$_POST['catname'];
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
]);
echo "OK";