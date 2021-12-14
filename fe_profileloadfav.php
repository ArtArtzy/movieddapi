<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$userid=$_POST['userid'];
// $userid=20;
$sql="select * from user where id='" . $userid . "'";
$result  = $db->query($sql)->fetchAll();
// print_r($result);
$fav=explode(",",$result[0]["fav"]);
// print_r($fav);
$sql2="select * from category order by orderid";
$result2  = $db->query($sql2)->fetchAll();
// print_r($result2);

for($i=0;$i<sizeof($result2);$i++){
    $result2[$i]["pick"] = "false";
}
// print_r($result2);
for($i=0;$i<sizeof($result2);$i++){
    for($j=0;$j<sizeof($fav);$j++){
        if($result2[$i]["id"]==$fav[$j]){
            $result2[$i]["pick"] = "true";
            // echo $fav[$j];
        }
    }
}
echo json_encode($result2);
?>