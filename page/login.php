<style type="text/css">
	body {
		background: #d5f0f3;
	}
	h1{
		text-align: center;
		font-weight: 300;
	}

	.tulisan_login{
		text-align: center;
		text-transform: uppercase;
	}

	.kotak_login{
		width: 350px;
		background: white;
		margin: 80px auto;
		padding: 30px 20px;
	}

	label{
		font-size: 11pt;
	}

	.form_login{
		box-sizing : border-box;
		width: 100%;
		padding: 10px;
		font-size: 11pt;
		margin-bottom: 20px;
	}

	.tombol_login{
		background: #46de4b;
		color: white;
		font-size: 11pt;
		width: 100%;
		border: none;
		border-radius: 3px;
		padding: 10px 20px;
	}

	.link{
		color: #232323;
		text-decoration: none;
		font-size: 10pt;
	}
</style>

<div class="kotak_login">
	<p class="tulisan_login">Silahkan login</p>

	<form method="POST">
		<label>Username</label>
		<input type="text" name="email_pelanggan" class="form_login" placeholder="Email ..">

		<label>Password</label>
		<input type="password" name="password_pelanggan" class="form_login" placeholder="Password ..">

		<input type="submit" class="tombol_login" name="btn-login" value="LOGIN">

		<br/>
		<br/>
		<center>
			<a class="link" href="?page=daftar">Belum Punya Akun ?</a>
		</center>
	</form>

</div>
<div style="padding-top: 11px;"></div>
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