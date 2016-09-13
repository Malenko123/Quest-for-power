<?php
function connect(){
	$con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "game");
}

function protect($string){
	return mysqli_real_escape_string(strip_tags($string()));

}
function output($string) {
    echo "<div id=\"output\">" . $string . "</div>";
}

?>