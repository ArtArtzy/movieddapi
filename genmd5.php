<?php

$host = "https://cdn.jwplayer.com/manifests/";
$path = "players/38g3LzJQ-qofscDvY.html";
$expire = time() +3600;
$secret = "Gu2fFdmxATRVokUvOb0hbc6c";
$base = $path . ":" . $expire . ":" . $secret;
$sig  =md5($base);
// echo "sig=" . $sig;


echo "exp=" . $expire . "&sig=" . $sig;
?>