<?php
    include '../core/config.php';

    $id = $_POST['id'];
    foreach($id as $cr_id){
        $query = $mysqli->query("DELETE FROM tbl_checklist_requirements WHERE cr_id = '$cr_id'");

        $mysqli->query("DELETE FROM tbl_clubs_requirements WHERE cr_id = '$cr_id'");
    }
    
    if($query){
        echo 1;
    }else{
        echo $query;
    }
?>