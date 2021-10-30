<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$searchText = $_POST['searchText'];
$sql = "select * from user where username LIKE '%" . $searchText ."%'";
$result  = $db->query($sql)->fetchAll();
echo json_encode($result);
?>