<?php
	include '../core/config.php';

	if(isset($_POST['update_user_id'])){
		$user_id		= $_POST['update_user_id'];
		$user_fname		= $_POST['update_user_fname'];
		$user_mname		= $_POST['update_user_mname'];	
		$user_lname		= $_POST['update_user_lname'];


		$user_gender			= $_POST['update_gender'];
		$user_birthdate			= $_POST['update_birthdate'];
		$user_contact_number	= $_POST['update_contact_number'];
		$user_address			= $_POST['update_address'];
		$user_course_id			= $_POST['update_course_id'];
		$user_category			= $_POST['update_category'];

		$username		= $_POST['update_username'];
		$password_		= $_POST['update_password'];

		if(usernameChecker($username,$user_id)==0){
			if($password_==""){
				$update_data = "user_fname = '$user_fname', user_mname = '$user_mname', user_lname = '$user_lname', username = '$username', user_gender = '$user_gender', user_birthdate = '$user_birthdate', user_contact_num = '$user_contact_number', user_address = '$user_address', course_id = '$user_course_id', category = '$user_category'";
			}else{
				$password = md5($password_);
				$update_data = "user_fname = '$user_fname', user_mname = '$user_mname', user_lname = '$user_lname', username = '$username', password = '$password', user_gender = '$user_gender', user_birthdate = '$user_birthdate', user_contact_num = '$user_contact_number', user_address = '$user_address', course_id = '$user_course_id', category = '$user_category'";
			}

			$mysqli->query("UPDATE tbl_users SET $update_data WHERE user_id = '$user_id' ") or die(mysql_error());
			echo 1;
		}else{
			echo 2;
		}
	}
?>