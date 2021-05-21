<?php 

	if (!isset($_POST['login'])) {
		echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
		echo "<script>location='login.php';</script>";
	} else if (isset($_POST['login'])) {
		// mengaktifkan session pada php
		session_start();

		// menghubungkan php dengan koneksi database
		include '../../config/koneksi.php';

		// menangkap data yang dikirim dari form login
		$username = $_POST['username'];
		$password = $_POST['password'];

		if ($username == "" && $password == "") {
			echo "<script>alert('Data Tidak Boleh Kosong');</script>";
			echo "<script>location='login.php';</script>";
		}

		date_default_timezone_set("Asia/Jakarta");

		$last_login = date("Y-m-d H:i:s");
		$con->query("UPDATE users SET last_login = '$last_login' WHERE username = '$username'");

		// menyeleksi data user dengan username dan password yang sesuai
		$result = $con->query("SELECT * FROM users WHERE username = '$username' ");

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
		
			if (password_verify($password, $row['password'])) {
				$_SESSION['login-admin'] = true;
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "admin";
				// alihkan ke halaman dashboard admin
		        echo "<script>alert('Berhasil Login');</script>";
		        echo "<script>location='../../admin/?page=dashboard';</script>";
			} else {
				echo "<script>alert('Maaf, Anda Salah Menginputkan Data');</script>";
				echo "<script>location='login.php';</script>";
			}
		} else {
			echo "<script>alert('Maaf, Data Gagal di Inputkan');</script>";
			echo "<script>location='login.php';</script>";
		}

	} else {
		echo "404 Not Found";
	}

?>