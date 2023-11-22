<?php 
function user_info($selected_data,$user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT $selected_data FROM tbl_users WHERE user_id='$user_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row[0];
}

function course_info($selected_data,$course_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT $selected_data FROM tbl_courses WHERE course_id='$course_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row[0];
}

function userFullName($user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_users WHERE user_id='$user_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row["user_lname"].", ".$row["user_fname"]." ".$row["user_mname"];
}

function studentFullName($student_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_students WHERE student_id='$student_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row["student_lname"].", ".$row["student_fname"]." ".$row["student_mname"];
}

function violationName($violation_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_violations WHERE violation_id='$violation_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row["violation_name"];
}

function sanctionName($sanction_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_sanctions WHERE sanction_id='$sanction_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row["sanction_name"];
}

function organizationalOfficerName($of_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_organizational_officers WHERE of_id='$of_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row["of_type"];
}

function ayName($ay_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_academic_year WHERE ay_id='$ay_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row["ay_name"];
}

function clubName($club_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_clubs WHERE club_id='$club_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row["club_name"];
}

function checklistRequirementsName($cr_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_checklist_requirements WHERE cr_id='$cr_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row["cr_desc"];
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

function userData($user_id,$field){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM tbl_users WHERE user_id='$user_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();
	$value = $row[$field];

	return $value;
}

function countUser(){
	global $mysqli;
	$fetch = $mysqli->query("SELECT count(user_id) AS counter FROM tbl_users") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row['counter'];
}

function countStudents(){
	global $mysqli;
	$fetch = $mysqli->query("SELECT count(student_id) AS counter FROM tbl_students") or die(mysqli_error());
	$row = $fetch->fetch_array();
	
	return $row['counter'];
}

function countServices(){
	global $mysqli;
	$fetch = $mysqli->query("SELECT count(services_id) AS counter FROM tbl_services") or die(mysqli_error());
	$row = $fetch->fetch_array();
	
	return $row['counter'];
}

function countCourses(){
	global $mysqli;
	$fetch = $mysqli->query("SELECT count(course_id) AS counter FROM tbl_courses") or die(mysqli_error());
	$row = $fetch->fetch_array();
	
	return $row['counter'];

}


?>