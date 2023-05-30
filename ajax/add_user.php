<?php 
	include '../core/config.php';
	$user_fname 	= $mysqli -> real_escape_string($_POST['user_fname']);
	$user_mname 	= $mysqli -> real_escape_string($_POST['user_mname']);
	$user_lname 	= $mysqli -> real_escape_string($_POST['user_lname']);
	$username 		= $mysqli -> real_escape_string($_POST['username']);
	$password_ 		= $mysqli -> real_escape_string($_POST['password']);
	$password 		= md5($password_);


	if(usernameChecker($username,0)==0){
		$mysqli->query("INSERT INTO tbl_users SET user_fname = '$user_fname', user_mname = '$user_mname', user_lname = '$user_lname', username = '$username', password = '$password'") OR die(mysql_error());
	
		echo 1;
	}else{
		echo 2; //USERNAME ALREADY USED
	}
?>