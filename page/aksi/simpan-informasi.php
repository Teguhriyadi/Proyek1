<?php

	if (!isset($_POST['btn-kirim'])) {
		echo "<script>alert('Maaf, Tidak Boleh Akses Sembarangan');</script>";
		echo "<script>location='?page=informasi';</script>";
		exit;
	} 

	$nama_user = $_POST['nama_user'];

	$result = $con->query("SELECT * FROM users WHERE username = '$nama_user'");

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
	}

	$id_user = $row['id'];
	$nama_informasi = $_POST['nama_informasi'];
	$keterangan = $_POST['keterangan'];
	date_default_timezone_set('Asia/Jakarta');
	$created_at = date("Y-m-d H:i:s");

	$query = $con->query("INSERT INTO informasi VALUES ('','$nama_informasi', 'Ada $keterangan','$created_at',0,$id_user)");

	if ($query != 0) {
		echo "<script>alert('Data Berhasil di Tambahkan');</script>";
		echo "<script>location='?page=informasi';</script>";
		exit;
	} else {
		echo "<script>alert('Data Gagal di Tambahkan');</script>";
		echo "<script>location='?page=informasi';</script>";
		exit;
	}

?>