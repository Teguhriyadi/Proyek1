<form method="POST">
	<div class="container">
		<div class="form-group">
			<label for="email"> Email </label>
			<input type="email" class="form-control" name="email_pelanggan" placeholder="Masukkan Email">
		</div>
		<div class="form-group">
			<label for="username"> Password </label>
			<input type="text" class="form-control" name="password_pelanggan" placeholder="Masukkan password">
		</div>
		<div class="form-group">
			<button class="btn btn-primary" name="btn-login">
				Daftar
			</button>
		</div>
	</div>
</form>

<?php 

if (isset($_POST['btn-login'])) {

	$email_pelanggan = $_POST['email_pelanggan'];
	$password_pelanggan = $_POST['password_pelanggan'];

	if ($email_pelanggan == "" && $password_pelanggan == "") {
		echo "<script>alert('Data Tidak Boleh Kosong');</script>";
		echo "<script>window.location.replace('?page=login');</script>";
		exit;
	}

	$result = $con->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email_pelanggan' ");

	if (mysqli_num_rows($result) === 1) {
		
		$row = mysqli_fetch_assoc($result);

		if (password_verify($password_pelanggan, $row['password_pelanggan'])) {
			$_SESSION['pelanggan'] = $row;
			echo "<script>alert('Berhasil');</script>";

			if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {
				echo "<script>location='?page=checkout';</script>";
			} else {
				echo "<script>location='?page=riwayat';</script>";
			}
		} else {
			echo "<script>alert('Gagal');</script>";
			echo "<script>location='?page=login';</script>";
		}

	} else {
		echo "<script>alert('Gagal');</script>";
		echo "<script>location='?page=login';</script>";
	}

}

?>