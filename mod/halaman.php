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
			include 'page/home.php';
			break;

		case 'about':
			include 'page/about.php';
			break;

		case 'contact':
			include 'page/kontak.php';
			break;
		
		default:
			echo "404 Not Found";
			break;
	}
?>