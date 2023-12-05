<?php
	include '../core/config.php';

	if(isset($_POST['update_services_id'])){
        $update_services_id		    = $_POST['update_services_id'];
		$update_services_desc		= $_POST['update_services_desc'];
		$update_services_remarks	= $_POST['update_services_remarks'];

		$query = $mysqli->query("UPDATE tbl_services SET services_desc = '$update_services_desc',services_remarks = '$update_services_remarks' WHERE services_id = '$update_services_id'") or die(mysql_error());
		
        if($query){
            echo 1;
        }else{
            echo 2;
        }
	}
?>