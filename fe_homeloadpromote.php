<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$userid=$_POST['userid'];  // ถ้าเป็น 0 แสดงว่าไม่ได้ login
$userid=19;

$sql="select id from movie where promotion = 1";
$moviePromote  = $db->query($sql)->fetchAll();
for($i=0;$i<sizeof($moviePromote);$i++){
    $moviePromote[$i]["type"] = 1;
}
// print_r($moviePromote);

$sql="select id from series where promotion = 1";
$seriesPromote  = $db->query($sql)->fetchAll();
for($i=0;$i<sizeof($seriesPromote);$i++){
    $seriesPromote[$i]["type"] = 2;
}
// print_r($seriesPromote);
$movieMergSeries=array_merge($moviePromote,$seriesPromote);
// print_r($movieMergSeries);
shuffle($movieMergSeries);
if(sizeof($movieMergSeries)<5){
    $promoteFiveMovie=$movieMergSeries;
    // echo "if";
}
else{
    // echo "else";
    $promoteFiveMovie=[];
    // $promoteFiveMovie[0]=$movieMergSeries[0];
    for($i=0;$i<5;$i++){
    array_push($promoteFiveMovie,$movieMergSeries[$i]);
    }
}
// print_r($promoteFiveMovie);
$sql="select * from userfav where userid='" . $userid . "'";
$movieserisFav= $db->query($sql)->fetchAll();
// print_r($movieserisFav);

for($i=0;$i<5;$i++){
    $promoteFiveMovie[$i][fav] = false;
}
for($i=0;$i<sizeof($movieserisFav);$i++){
    for($j=0;$j<5;$j++){
        if($movieserisFav[$i][movieseriesid]==$promoteFiveMovie[$j][id]&&$movieserisFav[$i][type]==$promoteFiveMovie[$j][type]){
            $promoteFiveMovie[$j][fav]=true;
            // echo "true";
        }
    }
}
// print_r($promoteFiveMovie);
echo json_encode($promoteFiveMovie);
?>