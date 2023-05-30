<?php
	include '../core/config.php';

	if(isset($_POST['update_sanction_id'])){
        $update_sanction_id		    = $_POST['update_sanction_id'];
		$update_sanction_name		= $_POST['update_sanction_name'];
		$update_sanction_desc		= $_POST['update_sanction_desc'];

		$update_data = "sanction_name = '$update_sanction_name', sanction_desc='$update_sanction_desc'";

		$query = $mysqli->query("UPDATE tbl_sanctions SET $update_data WHERE sanction_id = '$update_sanction_id' ") or die(mysql_error());
		
        if($query){
            echo 1;
        }else{
            echo 2;
        }
	}
?>