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

		date_default_timezone_set("Asia/Jakarta");

		$last_login = date("Y-m-d H:i:s");
		$con->query("UPDATE users SET last_login = '$last_login' WHERE username = '$username'");

		// menyeleksi data user dengan username dan password yang sesuai
		$login = mysqli_query($con,"select * from users where username='$username' and password='$password'");
		// menghitung jumlah data yang ditemukan
		$cek = mysqli_num_rows($login);

		// cek apakah username dan password di temukan pada database
		if($cek > 0){

			$data = mysqli_fetch_assoc($login);

			// cek jika user login sebagai admin
			if($data['level']=="admin"){

				// buat session login dan username
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "admin";
				// alihkan ke halaman dashboard admin
		        echo "<script>alert('Berhasil Login');</script>";
		        echo "<script>location='../../admin/?page=dashboard';</script>";

			// cek jika user login sebagai pegawai
			}else if($data['level']=="pegawai"){
				// buat session login dan username
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "pegawai";
				// alihkan ke halaman dashboard pegawai
				header("location:halaman_pegawai.php");

			// cek jika user login sebagai pengurus
			}else if($data['level']=="pengurus"){
				// buat session login dan username
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "pengurus";
				// alihkan ke halaman dashboard pengurus
				header("location:halaman_pengurus.php");

			}else{

				// alihkan ke halaman login kembali
				header("location:../../admin/?page=dashboard");
			}	
		}else{
			echo "<script>alert('Maaf, Anda Salah Menginputkan Data');</script>";
		    echo "<script>location='login.php';</script>";
		}
	} else {
		echo "404 Not Found";
	}

?>