<?php
	include '../core/config.php';

	if(isset($_POST['id'])){
        $id = $_POST['id'];
        $club_id = $_POST['club_id'];

        foreach($id AS $val){
            $query = $mysqli->query("INSERT INTO tbl_clubs_requirements SET cr_id = '$val', club_id = '$club_id' ");
	    }
    if($query){
        echo 1;
    }else{
        echo 0;
    }
    }
?>


