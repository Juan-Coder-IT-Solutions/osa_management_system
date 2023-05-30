<?php
	$view = "views/";

	if($page == 'dashboard' || $page == ''){
		require $view.'dashboard.php';
	}else{
		//require $view.'404.php';
	}
?>