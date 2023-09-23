<?php
	include '../core/config.php';

	if(isset($_POST['update_services_id'])){
        $update_services_id		    = $_POST['update_services_id'];
		$update_services_desc		= $_POST['update_services_desc'];

		$query = $mysqli->query("UPDATE tbl_services SET services_desc = '$update_services_desc' WHERE services_id = '$update_services_id' ") or die(mysql_error());
		
        if($query){
            echo 1;
        }else{
            echo 2;
        }
	}
?>