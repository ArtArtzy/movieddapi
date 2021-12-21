<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$userid=$_POST['userid'];
$password=$_POST['password'];
$newphone=$_POST['newphone'];
// $userid=19;
// $password="1122";
// $newphone="987654321";
$newphone=substr_replace($newphone,substr($newphone,4),3);
$newphone=substr_replace($newphone,substr($newphone,7),6);

$result=$db->select("user","password",[
    "id"=>$userid
]);
if(sizeof($result)>0){
    if($password==$result[0]){
        $result2  = $db->select("user","id",[
            "telephone"=>$newphone
        ]);
        if(sizeof($result2)>0){
            if($result2[0]!=$userid){
            echo "This phonenumber exist";
            }
            else{
                echo "not change";
            }
        }
        else{
        $db->update("user",[
            "telephone"=>$newphone
        ],[
            "id"=>$userid
        ]);
        echo "update";
    }
    }
    else{
        echo "Password incorrect";
    }
}
else{
    echo    "No user in data";
}
?>