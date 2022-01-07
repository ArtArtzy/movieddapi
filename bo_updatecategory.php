<?php
require_once('connection.php');
$result = $db->select("category","*");
for($i=0;$i<sizeof($result);$i++){
    $id = $result[$i]['id'];
    $typeName = "[" . $id . "]";
    $sql = "select count(id) as c1 from movie where type like '%" . $typeName . "%'";
    $result2  = $db->query($sql)->fetchAll();
    $countMovie =  $result2[0]['c1'];
    $sql = "select count(id) as c1 from series where type like '%" . $typeName . "%'";
    $result2  = $db->query($sql)->fetchAll();
    $countSeries =  $result2[0]['c1'];
    $db->update("category",[
        "movie"=>$countMovie,
        "series"=>$countSeries
    ],[
        "id"=>$id
    ]);
}

?>