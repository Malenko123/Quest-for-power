<?php
include("functions.php");
connect();

$con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "game");

mysqli_query($con, "DELETE FROM `logs` WHERE `time`<'".(time()-86400)."'") or die(mysql_error());

?>