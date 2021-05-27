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
			echo"";
			break;

		case 'checkout':
			echo"";
			break;

		case 'daftar':
			echo"";
			break;
		
		case 'hapus_keranjang':
			echo"";
			break;

		case 'keranjang':
			echo"";
			break;

		case 'lihat_pembayaran':
			echo"";
			break;

		case 'login':
			echo"";
			break;

		case 'logout':
			echo"";
			break;

		case 'nota':
			echo"";
			break;

		case 'pembayaran':
			echo"";
			break;

		case 'product_delivery':
			echo"";
			break;
			
		case 'riwayat':
			echo"";
			break;


		default:
			echo "404 Not Found";
			break;
	}
?>