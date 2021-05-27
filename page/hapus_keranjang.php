<?php
	$kode_barang = $_GET['kode_barang'];
	unset($_SESSION["keranjang"][$kode_barang]);

	echo "<script>alert('Produk Terhapus');</script>";
	echo "<script>location='?page=keranjang';</script>";
?>