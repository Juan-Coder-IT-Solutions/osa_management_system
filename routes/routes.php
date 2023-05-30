<?php
	$view = "views/";

	if($page == 'dashboard' || $page == ''){
		require $view.'dashboard.php';
	}else if($page == 'users'){
		require $view.'users.php';
	}else{
		//require $view.'404.php';
	}
?>