<?php
session_start();
include("header.php");
if(!isset($_SESSION['uid'])){
    echo "You must be logged in to view this page!";
}else{
    ?>
    <center><h2>Battle Players</h2></center>
    <br />
    <table cellpadding="2" cellspacing="2">
        <tr>
            <td width="50px"><b>Rank</b></td>
            <td width="150px"><b>Username</b></td>
            <td width="200px"><b>Gold</b></td>
        </tr>
        <?php

        $con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "game");

        $get_users = mysqli_query($con, "SELECT `id`,`overall` FROM `ranking` WHERE `overall`>'0' ORDER BY `overall` ASC") or die(mysql_error());
        while($row = mysqli_fetch_assoc($get_users)){
            echo "<tr>";
            echo "<td>" . $row['overall'] . "</td>";
            $get_user = mysqli_query($con, "SELECT `username` FROM `user` WHERE `id`='".$row['id']."'") or die(mysql_error());
            $rank_name = mysqli_fetch_assoc($get_user);
            echo "<td><a href=\"stats.php?id=" .$row['id']."\">" . $rank_name['username'] . "</a></td>";
            $get_gold = mysqli_query($con, "SELECT `gold` FROM `stats` WHERE `id`='".$row['id']."'") or die(mysql_error());
            $rank_gold = mysqli_fetch_assoc($get_gold);
            echo "<td>" . number_format($rank_gold['gold']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
}
include("footer.php");
?>