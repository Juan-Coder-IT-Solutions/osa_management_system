<?php
	include '../core/config.php';
    
    $user_id            = $_SESSION['user_id'];
    $newpassword       = md5($_POST['newpassword']);
    $renewpassword     = md5($_POST['renewpassword']);

    if($newpassword === $renewpassword){
        $mysqli->query("UPDATE tbl_users SET password='$newpassword' WHERE user_id = '$user_id' ") or die(mysql_error());
        echo 1;
    }else{
        echo 2;
    }
?>