<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id=$_POST['id'];


//add deleted data to deleteseires
$episodeData = $db->select("episode","*",[
    "seasonid"=>$id,
]);
    //Find series name
    $seriesData = $db->select("series","*",[
        "id"=>$episodeData[0]['seriesid']
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

$db->delete("season",[
"id"=>$id
]);
//Delete data from episode table
$db->delete("episode",[
    "seasonid"=>$id
]);

?>