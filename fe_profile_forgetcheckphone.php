<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$telephone=$_POST['telephone'];

$result=$db->select("user","id",[
    "telephone"=>$telephone
]);
if(sizeof($result)>0){
    echo json_encode($result2);
}
else{
    echo "fail";
}

?>