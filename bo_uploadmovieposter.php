<?php
require_once('connection.php');

$id = $_POST['id'];
if(isset($_FILES['file'])){
    $file = $_FILES['file']['tmp_name'];
    $real_file_name =  $_FILES['file']['name'];
    
    $file_info = pathinfo($real_file_name,PATHINFO_EXTENSION);
    
    $new_file_name = $id . "." . $file_info;
    copy($file,"poster/movie/".$new_file_name);
    chmod("poster/movie/".$new_file_name,0777);
}

?>