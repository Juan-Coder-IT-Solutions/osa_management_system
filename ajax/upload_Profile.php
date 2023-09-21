
<?php
include '../core/config.php';
$user_id = $_SESSION['user_id'];

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$path = '../assets/upload/'; // upload directory

$img = $_FILES['profileImage']['name'];
$tmp = $_FILES['profileImage']['tmp_name'];

$img_name = "-PROF-".$user_id.".PNG";
$slug = $img_name;

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// can upload same image using rand function
$final_image = rand(1000,1000000).$slug;

// check's valid format
if(in_array($ext, $valid_extensions)){ 
    $path = $path.$final_image; 

    if(move_uploaded_file($tmp,$path)){
        if(!empty($row['profile_img'])){
            if(file_exists($path)){
                @unlink($path);
            }
        }

    //insert form data in the database
    $update = $mysqli->query("UPDATE tbl_users set profile_img='$final_image' where user_id='$user_id' ");

    echo 1;
    }
}else {
    echo 2;
}

?>