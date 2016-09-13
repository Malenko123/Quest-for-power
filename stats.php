<?php
session_start();
include("header.php");
if(!isset($_SESSION['uid'])){
    echo "You must be logged in to view this page!";
}else{
    if(!isset($_GET['id'])){
        output("You have visited this page incorrectly!");
    }else{
        $id = ($_GET['id']);

        $con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "game");

        $user_check = mysqli_query($con, "SELECT * FROM `user` WHERE `id`='".$id."'") or die(mysql_error());
        if(mysqli_num_rows($user_check) == 0){
            output("There is no user with that ID!");
        }else{
            $s_user = mysqli_fetch_assoc($user_check);
            $stats_stats = mysqli_query($con, "SELECT * FROM `stats` WHERE `id`='".$id."'") or die(mysql_error());
            $s_stats = mysqli_fetch_assoc($stats_stats);
            $stats_rank = mysqli_query($con, "SELECT * FROM `ranking` WHERE `id`='".$id."'") or die(mysql_error());
            $s_rank = mysqli_fetch_assoc($stats_rank);
            ?>
            <center><h2>Player Stats</h2></center>
            <br />
            <?php
            echo $s_user['username'];
            ?>
            <br /><br />
            <b>Rank: <?php echo $s_rank['overall']; ?></b> 
            <br />
            <b>Gold: <?php echo number_format($s_stats['gold']); ?></b>
            <br />
            <br />
            <form action="battle.php" method="post">
            <?php
            $attacks_check = mysqli_query($con, "SELECT `id` FROM `logs` WHERE `attacker`='".$_SESSION['uid']."' AND `defender`='".$id."' AND `time`>'".(time() - 86400)."'") or die(mysql_error());
            ?>
            <i>Attacks on <?php echo $s_user['username']; ?> in the last 24 hours: (<?php echo mysqli_num_rows($attacks_check); ?>/5)</i><br />
            <?php
            if(mysqli_num_rows($attacks_check) < 5){
            ?>
            Number of Turns (1-10): <input type="text" name="turns" /> 
            <input type="submit" name="gold" value="Raid for Gold" />
            <input type="submit" name="food" value="Raid for Food" />
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <?php
            }
            ?>
            </form>
            <?php
        }
    }
}
include("footer.php");

?>