<?php
// แสดงข้อมูลเป็นหน้า
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$cat= $_POST['catName'];
$page = $_POST["pagedata"];
$pagestart = ($page-1)*10;
// echo $pagestart;
$pageend = ($page)*10;
if($cat == 0){
    $sql = "select * from movie limit " . $pagestart . " , " . "10";
} else {
    $sql = "select * from movie where  type like '%[" .  $cat . "]%' limit ". $pagestart . " , " . "10";
}
$result  = $db->query($sql)->fetchAll();
// print_r($result);
for($i=0;$i<sizeof($result);$i++){
    $result2 = $db->select("viewmovietotal","view",[
        "movieid"=>$result[$i]['id']
    ]);
    if(sizeof($result2) >0){
        $result[$i]['view'] = $result2[0];
    } else {
        $result[$i]['view']=0;
    }
}
echo json_encode($result);
?> 