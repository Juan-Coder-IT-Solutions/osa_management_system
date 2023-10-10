<?php
	include '../core/config.php';

	if(isset($_POST['update_cr_id'])){
        $cr_id		    = $_POST['update_cr_id'];
		$cr_desc		= $_POST['update_cr_desc'];

		$query = $mysqli->query("UPDATE tbl_checklist_requirements SET cr_desc = '$cr_desc' WHERE cr_id = '$cr_id' ") or die(mysql_error());
		
        if($query){
            echo 1;
        }else{
            echo 2;
        }
	}
?>