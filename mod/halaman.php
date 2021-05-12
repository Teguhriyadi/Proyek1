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
		
		case 'aksi-auth-login':
			include 'do_auth_login.php';
			break;

		case 'informasi':
			include 'page/informasi.php';
			break;

		case 'aksi-simpan-informasi':
			include 'page/aksi/simpan-informasi.php';
			break;

		default:
			echo "404 Not Found";
			break;
	}
?>