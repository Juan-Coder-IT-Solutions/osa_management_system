<?php
include '../core/config.php';
$user_id = $_SESSION['user_id'];

$img_tmp = $_FILES["profileImage"]["tmp_name"];
$img_name_ = $_FILES["profileImage"]["name"];
$img_ext = pathinfo($img_name_, PATHINFO_EXTENSION);
$img_quality = ($_FILES['profileImage']['size'] <= 500000)?100:30;
$raw_id = $_REQUEST['ing_u_raw_id'];

$img_name = "PROF-".$user_id.".PNG";
$slug = $img_name;
$dir = "../../assets/upload/".$img_name; 

echo upload_compressedImage($user_id, $img_tmp, $dir, $slug);

function upload_compressedImage($user_id, $img_tmp, $targetPath, $slug) {
    $fetch_user = $mysqli->query("SELECT `profile_img` FROM tbl_users WHERE user_id='$user_id'");
	$row = $fetch_user->fetch_array();
	$current_slug = "../../assets/upload/".$row['slug'];
    
	if(move_uploaded_file($img_tmp, $targetPath)) {
		if(!empty($row['image'])){
			if(file_exists($current_slug)){
				@unlink($current_slug);
			}
		}
		$mysqli->query("UPDATE tbl_users set `profile_img`='$slug' where user_id='$user_id' ");
		
		return "image uploaded!";
	}else{
		return "Image upload failed!";
	}
}

?>