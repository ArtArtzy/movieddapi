<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id=$_POST['id'];
$orderid=$_POST['orderid'];
$catname=$_POST['catname'];
// $id=1;
// $orderid=456;
// $catname="ดราม่า";
$result=$db->select("category","*",["id"=>$id]);
if($catname==$result[0]["catname"]){
    if($orderid!=$result[0]["orderid"]){
        $result2=$db->select("category","*",["orderid"=>$orderid]);
        if(sizeof($result2)>0){
            echo "order id exist";
        }
        else{
            $db->update("category",[

                "orderid"=>$orderid
            ],["id"=>$id]);
            echo "OK";
        }
    }else{
        echo "notchange";
    }
}
else{
    if($orderid==$result[0]["orderid"]){
        $result2=$db->select("category","*",["catname"=>$catname]);
        if(sizeof($result2)>0){
            echo "Category name exist";
        }
        else{
            $db->update("category",[

                "catname"=>$catname
            ],["id"=>$id]);
            echo "OK";
        }
    }else{
        $result2=$db->select("category","*",["orderid"=>$orderid]);
        if(sizeof($result2)>0){
            echo "Order id exist";
            return;
        }
        $result2=$db->select("category","*",["catname"=>$catname]);
        if(sizeof($result2)>0){
            echo "Category name exist";
            return;
        }
        $db->update("category",[

            "catname"=>$catname,
            "orderid"=>$orderid
        ],["id"=>$id]);
        echo "OK";
    }
}
?>