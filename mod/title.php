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
			echo "Dashboard";
			break;

		case 'detail':
			echo "Detail";
			break;

		case 'beli':
			echo"Beli";
			break;

		case 'checkout':
			echo"Checkout";
			break;

		case 'daftar':
			echo"Daftar";
			break;

		case 'hapus_keranjang':
			echo"Hapus Keranjang";
			break;
	
		case 'keranjang':
			echo"Keranjang";
			break;

		case 'lihat_pembayaran':
			echo"Lihat Pembayaran";
			break;

		case 'login':
			echo"Login";
			break;

		case 'logout':
			echo"Logout";	
			break;

		case 'nota':
			echo"Nota";
			break;

		case 'pembayaran':
			echo"Pembayaran";
			break;

		case 'product_delivery':
			echo"Pengiriman Produk";
			break;

		case 'riwayat':
			echo"Riwayat";
			break;

		case 'keranjang':
			echo "Keranjang";
			break;

		default:
			echo "404 Not Found";
			break;
	}

?>