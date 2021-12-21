<?php
// ใช้เพื่อหาจำนวน page ที่มีทั้งหมดของ movie
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$episodeid = $_POST['episodeid'];
$type = $_POST['type'];

$episodeid=5;
$type=2;

$sql = "select  problemid,problem, count(reportproblemseries.id) as noproblem from reportproblemseries inner join problem on reportproblemseries.problemid = problem.id  where episodeid = ". $episodeid . " and solved = 0 and type = " . $type . " group by problemid";

$result = $db->query($sql)->fetchAll();
if(sizeof($result) == 0){
    echo "no problem";
} else {
    echo json_encode($result);
}
?>