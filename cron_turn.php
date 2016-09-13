<?php
include("functions.php");
connect();

$con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "game");

$get_users = mysqli_query($con, "SELECT * FROM `stats`") or die(mysql_error());
while($user = mysqli_fetch_assoc($get_users)){
    $update = mysqli_query($con, "UPDATE `stats` SET
                            `gold`=`gold`+'".$user['income']."',
                            `food`=`food`+'".$user['farming']."',
                            `turns`=`turns`+'5' WHERE `id`='".$user['id']."'") or die(mysql_error());
}

?>