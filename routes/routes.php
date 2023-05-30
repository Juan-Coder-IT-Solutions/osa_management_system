<?php
	$view = "views/";

	if($page == 'dashboard' || $page == ''){
		require $view.'dashboard.php';
	}else if($page == 'users'){
		require $view.'users.php';
	}else if($page == 'students'){
		require $view.'students.php';
	}else if($page == 'courses'){
		require $view.'courses.php';
	}else if($page == 'sanctions'){
		require $view.'sanctions.php';
	}else if($page == 'violations'){
		require $view.'violations.php';
	}else if($page == 'offenses'){
		require $view.'offenses.php';
	}else{
		require $view.'404.php';
	}
?>