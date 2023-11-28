<?php
include '../core/config.php';

    $id = $_POST['id'];

    foreach($id AS $new_id){
        $mysqli->query("DELETE FROM tbl_clubs_requirements WHERE id='$new_id'");
    }

    echo 1;
?>