<?php
include("functions.php");
connect();
?>
<html>
<head>
	<title>Quest for Power</title>
	<link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="header">Quest for Power</div>
<div id="container">
<div id="navigation"><div id="nav_div">
<?php
 
if(isset($_SESSION['uid'])){
	include("safe.php");
	?>
&raquo; <a href="main.php">Your Stats</a><br /><br />
&raquo; <a href="rankings.php">Battle Player</a><br /><br />
&raquo; <a href="units.php">Your Units</a><br /><br />
&raquo; <a href="weapons.php">Your Weapons</a><br /><br />
&raquo; <a href="logout.php">Logout</a>


	<?php
	
}else{
?>
<form action="login.php" method="post">
		Username: <input type="text" name="username"/><br />
		Password: <input type="password" name="password"/><br />
		<input type="submit" name="login" value="Login"/>
</form>
&raquo; <a href="register.php">Register</a>
<?php
}

?>


</div></div>
<div id="content"><div id="con_div">