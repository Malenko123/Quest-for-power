<?php


    
$con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "game");

if(isset($_SESSION['uid'])){
$stats_get = mysqli_query($con, "SELECT * FROM `stats` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$stats = mysqli_fetch_assoc($stats_get);

$unit_get = mysqli_query($con, "SELECT * FROM `unit` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error($con));
$unit = mysqli_fetch_assoc($unit_get);

$user_get = mysqli_query($con, "SELECT * FROM `user` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error($con));
$user = mysqli_fetch_assoc($user_get);

$weapon_get = mysqli_query($con, "SELECT * FROM `weapon` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error($con));
$weapon = mysqli_fetch_assoc($weapon_get);
}

?>