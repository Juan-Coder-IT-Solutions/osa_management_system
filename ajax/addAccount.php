<?php 
	include '../core/config.php';

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query 	= $mysqli->query("INSERT INTO tbl_users SET `user_fname` ='$fname', `user_mname`='$mname', `user_lname`='$lname', `username`='$username', password='$password'");

    if($query){
        echo 1;
    }else{
        echo 0;
    }
	

?>