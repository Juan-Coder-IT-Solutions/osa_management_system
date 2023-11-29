<?php 
	include '../core/config.php';
	$user_fname 	= $mysqli -> real_escape_string($_POST['user_fname']);
	$user_mname 	= $mysqli -> real_escape_string($_POST['user_mname']);
	$user_lname 	= $mysqli -> real_escape_string($_POST['user_lname']);
	$gender			= $mysqli -> real_escape_string($_POST['gender']);
	$birthdate		= $mysqli -> real_escape_string($_POST['birthdate']);
	$contact_number	= $mysqli -> real_escape_string($_POST['contact_number']);
	$course_id		= $mysqli -> real_escape_string($_POST['course_id']);
	$category		= $mysqli -> real_escape_string($_POST['category']);
	$address		= $mysqli -> real_escape_string($_POST['address']);
	$username 		= $mysqli -> real_escape_string($_POST['username']);
	$password 		= md5($mysqli -> real_escape_string($_POST['password']));
	
	if(usernameChecker($username,0)==0){
		$mysqli->query("INSERT INTO tbl_users SET user_fname = '$user_fname', user_mname = '$user_mname', user_lname = '$user_lname', user_gender = '$gender', user_address = '$address', user_birthdate = '$birthdate', user_contact_num = '$contact_number', course_id = '$course_id', category = '$category',  username = '$username', password = '$password'") OR die(mysql_error());
		
		$last_id = $mysqli -> insert_id;
		$user_code = sprintf('%09d', $last_id);
		$mysqli->query("UPDATE tbl_users set user_code = '$user_code' WHERE user_id ='$last_id'");
		echo 1;
	}else{
		echo 2; //USERNAME ALREADY USED
	}
?>