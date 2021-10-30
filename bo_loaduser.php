<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);$_POST = json_decode(file_get_contents("php://input"),true);
$page = $_POST['page'];
$userPerPage = $_POST['userPerPage'];
$pageStart = ($page-1)*$userPerPage;
$sql = "select * from user limit " . $pageStart . " , " . $userPerPage;
$result  = $db->query($sql)->fetchAll();
echo json_encode($result);
?>
