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
	}else if($page == 'academic_year'){
		require $view.'academic_year.php';
	}else if($page == 'profile'){
		require $view.'profile.php';


	}else if($page == 'exemplary_students'){
		require $view.'exemplary_students.php';
	}else if($page == 'calendar_of_activities'){
	 	require $view.'calendar_of_activities.php';
	}else if($page == 'good_moral_releasing'){
	 	require $view.'good_moral_releasing.php';


	}else{
		require $view.'404.php';
	}
?>