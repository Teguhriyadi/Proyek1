<?php
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = "home";
	}
?>

<?php

	switch ($page) {
		case 'home':
			echo "Home";
			break;
		
		default:
			echo "404 Not Found";
			break;
	}

?>