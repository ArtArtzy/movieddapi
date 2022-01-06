<?php
function convertCatname($allCat,$db){
$textreturn="";
$arrCat=explode(",",$allCat);

for($i=0;$i<sizeof($arrCat);$i++){
    $arrCat[$i]=trim($arrCat[$i],"[");
    $arrCat[$i]=trim($arrCat[$i],"]");
}
$result=$db->select("category","*");

for($i=0;$i<sizeof($arrCat);$i++){
    for($j=0;$j<sizeof($result);$j++){

        if($arrCat[$i]==$result[$j]['id']){

            $str=$result[$j]['catname'];
            $textreturn=$textreturn . "| " . $str . " ";
        }
    }
}
$textreturn=ltrim($textreturn,"|");
return $textreturn;
}
?>