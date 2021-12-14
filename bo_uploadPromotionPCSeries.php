<?php
require_once('connection.php');
$id = $_POST['id'];
if(isset($_FILES['file'])){
    $file = $_FILES['file']['tmp_name'];
    $real_file_name =  $_FILES['file']['name'];
    
    $file_info = pathinfo($real_file_name,PATHINFO_EXTENSION);
    
    $new_file_name = $id . "p" . "." . $file_info;
    copy($file,"promotion/series/".$new_file_name);
    chmod("promotion/series/".$new_file_name,0777);
    $db->update("series",["promotionPCPic"=>1],["id"=>$id]);
}

?>