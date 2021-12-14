<?php
// ใช้เพื่อหาจำนวน page ที่มีทั้งหมดของ movie
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$movieid = $_POST['movieid'];
$type = $_POST['type'];
$sql = "select  problemid,problem, count(reportproblemmovie.id) as noproblem from reportproblemmovie inner join problem on reportproblemmovie.problemid = problem.id  where movieid = ". $movieid . " and solved = 0 and type = " . $type . " group by problemid";
$result = $db->query($sql)->fetchAll();
if(sizeof($result) == 0){
    echo "no problem";
} else {
    echo json_encode($result);
}
?>