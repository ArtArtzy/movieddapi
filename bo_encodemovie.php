<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$movieCode=$_POST['movieCode'];
$result = $db->select("securitycode","*");
$secret = $result[0]['code'];
$path = "players/" . $movieCode . "-qofscDvY.html";
$expire = time() +3600;
$base = $path . ":" . $expire . ":" . $secret;
$sig  =md5($base);
$output = "https://cdn.jwplayer.com/players/" . $movieCode ."-qofscDvY.html?exp=" . $expire .  "&sig=" . $sig;
echo $output;
?>