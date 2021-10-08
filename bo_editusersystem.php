<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$us_id=$_POST['us_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$us_category= $_POST['us_category'];
$us_movie=$_POST['us_movie'];
$us_series=$_POST['us_series'];
$us_ads=$_POST['us_ads'];
$us_analytic=$_POST['us_analytic'];
$us_user=$_POST['us_user'];
$us_admin=$_POST['us_admin'];
$db->update("usersystem",[
    "username"=>$username,
    "password"=>$password,
    "us_category"=>$us_category,
    "us_movie"=>$us_movie,
    "us_series"=>$us_series,
    "us_ads"=>$us_ads,
    "us_analytic"=>$us_analytic,
    "us_user"=>$us_user,
    "us_admin"=>$us_admin
],[
    "us_id"=>$us_id
]);
?>