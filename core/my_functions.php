<?php 
function user_info($selected_data,$user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT $selected_data FROM users WHERE user_id='$user_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row[0];
}

function userFullName($user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_users WHERE user_id='$user_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row["user_lname"].", ".$row["user_fname"]." ".$row["user_mname"];
}

function usernameChecker($username,$update_user_id){
	global $mysqli;
	if($update_user_id>0){
		//FOR UPDATE
		$fetch = $mysqli->query("SELECT * FROM tbl_users WHERE username='$username' AND user_id !='$update_user_id'") or die(mysqli_error());
	}else{
		//FOR ADD
		$fetch = $mysqli->query("SELECT * FROM tbl_users WHERE username='$username'") or die(mysqli_error());
	}
	$result = mysqli_num_rows($fetch);

	return $result;
}
?>