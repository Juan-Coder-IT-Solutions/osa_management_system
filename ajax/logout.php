<?php 
	include '../core/config.php';
	unset($_SESSION['user_id']);

	session_destroy();
?>