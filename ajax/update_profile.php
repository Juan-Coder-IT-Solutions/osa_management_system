<?php
	include '../core/config.php';
    
    $user_id        = $_SESSION['user_id'];
    $user_fname		= $_POST['user_fname'];
    $user_mname		= $_POST['user_mname'];	
    $user_lname		= $_POST['user_lname'];
    $username		= $_POST['username'];

    if(usernameChecker($username,$user_id)==0){
        
        $update_data = "user_fname = '$user_fname', user_mname = '$user_mname', user_lname = '$user_lname', username = '$username'";

        $mysqli->query("UPDATE tbl_users SET $update_data WHERE user_id = '$user_id' ") or die(mysql_error());
        echo 1;
    }else{
        echo 2;
    }
?>