<?php 
	if (!isset($_POST['btn-login'])) {
		echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
		echo "<script>location='index.php';</script>";
	} else if (isset($_POST['btn-login'])) {

		// menghubungkan php dengan koneksi database
		include 'config/koneksi.php';
		//session_start();
		// menangkap data yang dikirim dari form login
		$username = $_POST['username'];
		$password = $_POST['password'];

		date_default_timezone_set("Asia/Jakarta");

		$last_login = date("Y-m-d H:i:s");
		$con->query("UPDATE users SET last_login = '$last_login' WHERE username = '$username'");

		// menyeleksi data user dengan username dan password yang sesuai
		$result = $con->query("SELECT * FROM users WHERE username = '$username' ");

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
		
			if (password_verify($password, $row['password'])) {
				$_SESSION['login'] = true;
				$_SESSION['user'] = $username;
				$_SESSION['level'] = "informan";
				// alihkan ke halaman dashboard admin
		        echo "<script>alert('Berhasil Login');</script>";
		        echo "<script>location='?page=home';</script>";
			}
		}

	} else {
		echo "404 Not Found";
	}

?>