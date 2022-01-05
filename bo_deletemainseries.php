<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];

//Delete poster file
$fileName = "poster/series/" . $id . ".jpg";
unlink($fileName);

//add deleted data to deleteseires
$episodeData = $db->select("episode","*",[
    "seriesid"=>$id
]);
    //Find series name
    $seriesData = $db->select("series","*",[
        "id"=>$id
    ]);
    $seriesName = $seriesData[0]['nameEng'];

for($i=0; $i<sizeof($episodeData); $i++){
    $seasonData = $db->select("season","*",[
        "id"=>$episodeData[$i]['seasonid']
    ]);
    $seasonName = $seasonData[0]['name'];
    $episodeName = $episodeData[$i]['name'];
    $month = date('m');
    $year = date('Y');

    if(strlen($episodeData[$i]['movieCodeEng']) > 0){
        $movieCode = $episodeData[$i]['movieCodeEng'];
        $type = 2;
        $db->insert("deletedseries",[
            "seriesName"=>$seriesName,
            "seasonName"=>$seasonName,
            "episodeName"=>$episodeName,
            "movieCode"=>$movieCode,
            "month"=>$month,
            "year"=>$year,
            "type"=>$type,
            "status"=>0
        ]);
    }
    if(strlen($episodeData[$i]['movieCodeTh']) > 0){
        $movieCode = $episodeData[$i]['movieCodeTh'];
        $type = 1;
        $db->insert("deletedseries",[
            "seriesName"=>$seriesName,
            "seasonName"=>$seasonName,
            "episodeName"=>$episodeName,
            "movieCode"=>$movieCode,
            "month"=>$month,
            "year"=>$year,
            "type"=>$type,
            "status"=>0
        ]);
    }
}
//Delete data from episode table
$db->delete("episode",[
    "seriesid"=>$id
]);
//Delete promote file
$fileName = "promotion/series/" . $id . "m.jpg";
unlink($fileName);
$fileName = "promotion/series/" . $id . "t.jpg";
unlink($fileName);
$fileName = "promotion/series/" . $id . "p.jpg";
unlink($fileName);



//Delete data from series table
$db->delete("series",[
    "id"=>$id
]);
?>