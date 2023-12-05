<?php 
	include '../core/config.php';
	$club_name 	= $mysqli -> real_escape_string($_POST['club_name']);
	$club_type 	= $mysqli -> real_escape_string($_POST['club_type']);

    $query = $mysqli->query("INSERT INTO tbl_clubs SET club_name = '$club_name',club_type='$club_type'") OR die(mysql_error());
	
    if($query){
        echo 1;
    }else{
        echo 2;
    }

?>