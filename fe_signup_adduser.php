<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$username=$_POST['username'];
$password=$_POST['password'];
$telephone=$_POST['telephone'];
// $username="abcdefg";
// $password="12345678";
// $telephone="0547893256";
$telephone=substr_replace($telephone,substr($telephone,4),3);
$telephone=substr_replace($telephone,substr($telephone,7),6);

$result=$db->select("user","id",[
    "telephone"=>$telephone,
]);
if(sizeof($result)>0){
    echo "This phone number exist";
}
else{
    $result2=$db->select("user","id",[
        "username"=>$username,
    ]);
    if(sizeof($result2)>0){
        echo "This username exist";
    }
    else{
        $db->insert("user",[
            "username"=>$username,
            "password"=>$password,
            "telephone"=>$telephone,
            "status"=>1,
            "fav"=>""
        ]);
        $result3=$db->select("user","id",[
            "username"=>$username
        ]);
        echo $result3[0];
    }
}
?>