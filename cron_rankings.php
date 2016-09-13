<?php
include("functions.php");
connect();

$con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "game");

$get_attack = mysqli_query($con, "SELECT `id`,`attack` FROM `stats` ORDER BY `attack` DESC") or die(mysql_error());
$i = 1;
$rank = array();
while($attack = mysqli_fetch_assoc($get_attack)){
    $rank[$attack['id']] = $attack['attack'];
    mysqli_query($con, "UPDATE `ranking` SET `attack`='".$i."' WHERE `id`='".$attack['id']."'") or die(mysql_error());
    $i++;
}

$get_defense = mysqli_query($con, "SELECT `id`,`defense` FROM `stats` ORDER BY `defense` DESC") or die(mysql_error());
$i = 1;
while($defense = mysqli_fetch_assoc($get_defense)){
    $rank[$defense['id']] += $defense['defense'];
    mysqli_query($con, "UPDATE `ranking` SET `defense`='".$i."' WHERE `id`='".$defense['id']."'") or die(mysql_error());
    $i++;
}

asort($rank);
$rank2 = array_reverse($rank,true);
$i = 1;
foreach($rank2 as $key => $val){
    mysqli_query($con, "UPDATE `ranking` SET `overall`='".$i."' WHERE `id`='".$key."'") or die(mysql_error());
    $i++;
}
?>