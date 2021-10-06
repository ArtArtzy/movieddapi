<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$username = $_POST['username'];
$password = $_POST['password'];
$us_category= $_POST['us_category'];
$us_movie=$_POST['us_movie'];
$us_series=$_POST['us_series'];
$us_ads=$_POST['us_ads'];
$us_analytic=$_POST['us_analytic'];
$us_user=$_POST['us_user'];
$us_admin=$_POST['us_admin'];
$result=$db->select("usersystem","*",["username"=>$username]);
function generateRandomString($length =20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$token =  generateRandomString();
if(sizeof($result)>0) {
    echo "NR";
    return;
}
$db->insert("usersystem",[
    "username"=>$username,
    "password"=>$password,
    "us_category"=>$us_category,
    "us_movie"=>$us_movie,
    "us_series"=>$us_series,
    "us_ads"=>$us_ads,
    "us_analytic"=>$us_analytic,
    "us_user"=>$us_user,
    "us_admin"=>$us_admin,
    "token"=>$token
]);
?>
<!-- เพิ่ม user ใน  usersystem -->