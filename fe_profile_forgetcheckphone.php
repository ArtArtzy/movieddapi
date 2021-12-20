<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$telephone=$_POST['telephone'];
$telephone="097-879-8855";
$telephone=substr_replace($telephone,substr($telephone,4),3);
$telephone=substr_replace($telephone,substr($telephone,7),6);

echo $telephone;
$result=$db->select("user","id",[
    "telephone"=>$telephone
]);
if(sizeof($result)>0){
    echo json_encode($result);
}
else{
    echo "fail";
}

?>