<?php
// แสดงข้อมูลเป็นหน้า
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$episodeid = $_POST['episodeid'];
$type = $_POST['type'];
if($type == 1){
    $db->update("episode",[
        "alertThaiSound"=>0
    ],[
        "id"=>$episodeid
    ]); 
} else {
    $db->update("episode",[
        "alertThaiSub"=>0
    ],[
        "id"=>$episodeid
    ]); 
}
?>