<?php
session_start(); 


include("header.php");

if(isset($_POST['login'])){
	if(isset($_SESSION['uid'])){
		echo "You are already logged in!";
	}else{
		$username=($_POST['username']);
	    $password=($_POST['password']);
	    $con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "game") or die(mysqli_error());
	    $login_check=mysqli_query($con, "SELECT `id` FROM `user` WHERE `username`='$username' AND `password`='".md5($password)."'") or die(mysql_error($con));
	    if(mysqli_num_rows($login_check)==0){
	    	echo "Invalid Username/Password Combination!";
	    }else{
	    	$get_id=mysqli_fetch_assoc($login_check);
	    	$_SESSION['uid']=$get_id['id'];
	    	header("Location:main.php");
	    }
	}
}else{
	echo "You are visiting this page incorrectly!";
}
include("footer.php");
?>