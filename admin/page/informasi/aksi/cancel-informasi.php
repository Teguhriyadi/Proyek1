<?php
	$id_informasi = $_POST['id_informasi'];
	$status = 1;

	$query = $con->query("UPDATE informasi SET status = 0 WHERE id_informasi = $id_informasi");

	if ($query != 0) {
		echo "<script>alert('Data Berhasil di Ubah');</script>";
		echo "<script>location='?page=informasi';</script>";
	} else {
		echo "<script>alert('Data Gagal di Ubah');</script>";
		echo "<script>location='?page=informasi';</script>";
	}
?>