<?php 
	include '../core/config.php';
	// $student_code 			= $mysqli -> real_escape_string($_POST['student_code']);
	$student_fname 			= $mysqli -> real_escape_string($_POST['student_fname']);
	$student_mname 			= $mysqli -> real_escape_string($_POST['student_mname']);
	$student_lname 			= $mysqli -> real_escape_string($_POST['student_lname']);
	$student_birthdate 		= $mysqli -> real_escape_string($_POST['student_birthdate']);
	$student_gender 		= $mysqli -> real_escape_string($_POST['student_gender']);
	$student_address 		= $mysqli -> real_escape_string($_POST['student_address']);
	$student_contact_num 	= $mysqli -> real_escape_string($_POST['student_contact_num']);
	$course_id 				= $mysqli -> real_escape_string($_POST['course_id']);
	$username				=$mysqli -> real_escape_string($_POST['username']);
	$password				=md5($mysqli -> real_escape_string($_POST['password']));

	$mysqli->query("INSERT INTO tbl_users SET user_fname = '$student_fname', user_mname = '$student_mname', user_lname = '$student_lname', user_gender = '$student_gender', user_address = '$student_address', user_birthdate = '$student_birthdate', user_contact_num = '$student_contact_num', course_id = '$course_id', category = 'S',  username = '$username', password = '$password'") OR die(mysql_error());
	
	echo 1;
	
?>