<?php
	include '../core/config.php';

	if(isset($_POST['update_club_id'])){
        $update_club_id		= $_POST['update_club_id'];
		$update_club_name	= $_POST['update_club_name'];
		$update_club_type	= $_POST['update_club_type'];


		$query = $mysqli->query("UPDATE tbl_clubs SET club_name = '$update_club_name', club_type='$update_club_type' WHERE club_id = '$update_club_id' ") or die(mysql_error());
		
        if($query){
            echo 1;
        }else{
            echo 2;
        }
	}
?>


