<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$menuid = $_POST['menuid'];
$token = $_POST['token'];

$result = $db->select("usersystem","*",[
    "token"=>$token
]);
if(sizeof($result)==0){
    echo "logout";
}
if($menuid == 1){
    if($result[0]['us_category'] == 1){
        echo "pass";
    } else {
        echo "not pass";
    }
} else if($menuid == 2){
    if($result[0]['us_movie'] == 1){
        echo "pass";
    } else {
        echo "not pass";
    }
}  else if($menuid == 3){
    if($result[0]['us_series'] == 1){
        echo "pass";
    } else {
        echo "not pass";
    }
} else if($menuid == 4){
    if($result[0]['us_ads'] == 1){
        echo "pass";
    } else {
        echo "not pass";
    }
}  else if($menuid == 5){
    if($result[0]['us_analytic'] == 1){
        echo "pass";
    } else {
        echo "not pass";
    }
} else if($menuid == 6){
    if($result[0]['us_user'] == 1){
        echo "pass";
    } else {
        echo "not pass";
    }
} else if($menuid == 7){
    if($result[0]['us_admin'] == 1){
        echo "pass";
    } else {
        echo "not pass";
    }
} 
?>