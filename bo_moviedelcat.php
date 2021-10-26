<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$cat = $_POST['cat'];
for($i=0;$i<sizeof($cat);$i++){
    $catData = $cat[$i];
    $db->update("category",
    [
        "movie[-]"=>1
    ]
    ,[
        "id"=>$cat[$i]
    ]);
}
?>