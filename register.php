<?php
session_start(); 
include("header.php");





?>

<br />

<?php
if(isset($_POST['register'])){
	$username=($_POST['username']);
	$password=($_POST['password']);
	$email=($_POST['email']);

	if($username == "" || $password == "" || $email == ""){
        echo "Please supply all the fields!";
    }elseif(strlen($username) > 20){
        echo "Username must be less than 20 characters!";
    }elseif(strlen($email) > 100){
        echo "E-mail must be less than 100 characters!";
	}else{

$con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "game") or die(mysqli_error());
		$register1=mysqli_query($con,  "SELECT `id` FROM `user` WHERE `username`='$username'") or die(mysql_error());
		$register2=mysqli_query($con,  "SELECT `id` FROM `user` WHERE `email`='$email'") or die(mysql_error());
		if(mysqli_num_rows($register1)>0){
			echo "That username is already in use!";
		}elseif(mysqli_num_rows($register2)>0){
			echo "That e-mail adress is already in use!";
		}else{
		    $ins1 = mysqli_query($con, "INSERT INTO `stats` (`gold`,`attack`,`defense`,`food`,`income`,`farming`,`turns`) VALUES (100,10,10,100,10,11,100)") or die(mysqli_error($con));
            $ins2 = mysqli_query($con, "INSERT INTO `unit` (`worker`,`farmer`,`warrior`,`defender`) VALUES (5,5,0,0)") or die(mysqli_error($con));
            $ins3 = mysqli_query($con, "INSERT INTO `user` (`id`,`username`,`password`,`email`) VALUES (NULL,'$username','".md5($password)."','$email')") or die(mysqli_error($con));
            $ins4 = mysqli_query($con, "INSERT INTO `weapon` (`sword`,`shield`) VALUES (0,0)") or die(mysqli_error($con));
            $ins5 = mysqli_query($con, "INSERT INTO `ranking` (`attack`,`defense`,`overall`) VALUES(0,0,0)") or die(mysqli_error($con)); 
            	
            
            echo "You have registered!";

		}
	}

}
?>

<form action="register.php" method="POST">
Username: <input type="text" name="username"/><br />
Password: <input type="password" name="password"/><br />
E-mail: <input type="text" name="email"/><br />
<input type="submit" name="register" value="Register"/>

</form>
<?php
include("footer.php");
?>