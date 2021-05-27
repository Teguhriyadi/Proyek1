<?php
	$kode_barang = $_GET['kode_barang'];

	if (isset($_SESSION['keranjang'][$kode_barang])) {
		$_SESSION['keranjang'][$kode_barang]+=1;
	}
	else{
		$_SESSION['keranjang'][$kode_barang] = 1;
	}

	echo "<script>alert('Produk Sudah Masuk ke Keranjang');</script>";
	echo "<script>location='?page=keranjang';</script>";
?>