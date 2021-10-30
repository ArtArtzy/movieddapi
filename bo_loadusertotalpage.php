<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$userPerPage = $_POST['userPerPage'];
$result = $db->count("user");
$totalpage = ceil($result/$userPerPage);
echo $totalpage;