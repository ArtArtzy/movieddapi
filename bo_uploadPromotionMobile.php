<?php
require_once('connection.php');
$id = $_POST['id'];
if(isset($_FILES['file'])){
    $file = $_FILES['file']['tmp_name'];
    $real_file_name =  $_FILES['file']['name'];
    
    $file_info = pathinfo($real_file_name,PATHINFO_EXTENSION);
    
    $new_file_name = $id . "m" . "." . $file_info;
    copy($file,"promotion/movie/".$new_file_name);
    chmod("promotion/movie/".$new_file_name,0777);
    $db->update("movie",["promotionMobilePic"=>1],["id"=>$id]);
}

?>