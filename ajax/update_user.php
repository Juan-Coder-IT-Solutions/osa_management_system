<?php
	include '../core/config.php';

	if(isset($_POST['update_user_id'])){
		$user_id		= $_POST['update_user_id'];
		$user_fname		= $_POST['update_user_fname'];
		$user_mname		= $_POST['update_user_mname'];	
		$user_lname		= $_POST['update_user_lname'];
		$username		= $_POST['update_username'];
		$password_		= $_POST['update_password'];

		if(usernameChecker($username,$user_id)==0){
			if($password_==""){
				$update_data = "user_fname = '$user_fname', user_mname = '$user_mname', user_lname = '$user_lname', username = '$username'";
			}else{
				$password = md5($password_);
				$update_data = "user_fname = '$user_fname', user_mname = '$user_mname', user_lname = '$user_lname', username = '$username', password = '$password'";
			}

			$mysqli->query("UPDATE tbl_users SET $update_data WHERE user_id = '$user_id' ") or die(mysql_error());
			echo 1;
		}else{
			echo 2;
		}
	}
?>