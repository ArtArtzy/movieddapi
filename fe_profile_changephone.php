<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$userid=$_POST['userid'];
$password=$_POST['password'];
$newphone=$_POST['newphone'];
$userid=19;
$password="1122";
$newphone="987654321";

$result=$db->select("user","password",[
    "id"=>$userid
]);
if(sizeof($result)>0){
    if($password==$result[0]){
        // echo $newphone;
        // $sql="update user set telephone='" . $newphone . "' where id=" . $userid;
        // $result2  = $db->query($sql)->fetchAll();

        $db->update("user",[
            "telephone"=>$newphone
        ],[
            "id"=>$userid
        ]);
        echo "update";
    }
    else{
        echo "Password incorrect";
    }
}
else{
    echo    "No user in data";
}
?>