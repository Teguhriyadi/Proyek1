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

		case 'detail':
			include 'page/detail.php';
			break;

		case 'beli':
			include 'page/beli.php';
			break;

		case 'checkout':
			include 'page/checkout.php';
			break;

		case 'daftar':
			include 'page/daftar.php';
			break;
		
		case 'hapus_keranjang':
			include 'page/hapus_keranjang.php';
			break;

		case 'keranjang':
			include 'page/keranjang.php';
			break;

		case 'lihat_pembayaran':
			include 'page/lihat_pembayaran.php';
			break;

		case 'login':
			include "page/login.php";
			break;

		case 'nota':
			include 'page/nota.php';
			break;

		case 'pembayaran':
			include 'page/pembayaran.php';
			break;
			
		case 'riwayat':
			include 'page/riwayat.php';
			break;

		case 'logout':
			include 'page/logout.php';
			break;

		default:
			include 'page/404.php';
			break;
	}
?>