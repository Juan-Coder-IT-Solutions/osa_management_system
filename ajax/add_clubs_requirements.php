<?php
include '../core/config.php';
$cr_id = $_POST['cr_id'];
$of_id = $_POST['of_id'];

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif','docs','docx', 'pdf'); // valid extensions
$path = '../assets/uploaded_files/'; // upload directory

$img = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

$img_name = "-file-".$cr_id.".".$ext;
$slug = $img_name;


// can upload same image using rand function
$final_image = rand(1000,1000000).$slug;

// check's valid format
if(in_array($ext, $valid_extensions)){ 
    $path = $path.$final_image; 

    if(move_uploaded_file($tmp,$path)){
         $query = $mysqli->query("INSERT INTO tbl_clubs_requirements SET cr_id = '$cr_id', of_id = '$of_id',attached_file='$final_image' ");

    echo 1;
    }
}else {
    echo 2;
}

?>

