<?php	$page = $_SERVER['REQUEST_URI'];
		if(strpos($page, 'index')!== false || strpos($page, 'edit')!== false) {
			echo '
			<link rel="stylesheet" href="css/jodit.min.css">
			<script src="js/jodit.min.js"></script>';
		};
		date_default_timezone_set('Asia/Bangkok');
?>
	<link rel="stylesheet" href="css/style.css">
	<script defer src="js/all.js"></script> <!--load all styles -->