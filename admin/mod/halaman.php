<?php

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = "dashboard";
	}

?>

<?php

	switch ($page) {
		case 'dashboard':
			include 'page/dashboard.php';
			break;
		
		default:
			echo "404 Not Found";
			break;
	}

?>