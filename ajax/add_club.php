<?php 
	include '../core/config.php';
	$club_name 	= $mysqli -> real_escape_string($_POST['club_name']);

    $query = $mysqli->query("INSERT INTO tbl_clubs SET club_name = '$club_name'") OR die(mysql_error());
	
    if($query){
        echo 1;
    }else{
        echo 2;
    }

?>