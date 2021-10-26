<?php
// ใช้เพื่อหาจำนวน page ที่มีทั้งหมดของ movie
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$sql = "select  problemid,problem, count(reportproblemmovie.id) as noproblem from reportproblemmovie inner join problem on reportproblemmovie.problemid = problem.id  where movieid = ". $id . " and solved = 0 group by problemid";
$result = $db->query($sql)->fetchAll();
echo json_encode($result);
?>