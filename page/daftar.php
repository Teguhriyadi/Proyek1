
<form method="POST" style="padding: 30px;">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<i class="fa fa-plus"></i> Daftar Pelanggan
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="email_pelanggan"> Email Pelanggan </label>
							<input type="text" class="form-control" name="email_pelanggan" placeholder="Masukkan email" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="password_pelanggan"> Password </label>
							<input type="password" class="form-control" name="password_pelanggan" placeholder="Masukkan password" autocomplete="off">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="nama_pelanggan"> Nama Pelanggan </label>
							<input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" autocomplete="off">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="telepon_pelanggan"> Telepon Pelanggan </label>
							<input type="text" class="form-control" name="telepon_pelanggan" placeholder="Masukkan Telepon Pelanggan" autocomplete="off">
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label for="alamat_pelanggan"> Alamat Pelanggan </label>
					<textarea class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" rows="5" placeholder="Masukkan Alamat Pelanggan" autocomplete="off"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block btn-sm" name="btn-submit">
						<i class="fa fa-save"></i> Daftar
					</button>
				</div>
			</div>
		</div>
	</div>
</form>

<?php
if (isset($_POST['btn-submit'])) {

	$email_pelanggan = $_POST['email_pelanggan'];
	$password_pelanggan = $_POST['password_pelanggan'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$telepon_pelanggan = $_POST['telepon_pelanggan'];
	$alamat_pelanggan = $_POST['alamat_pelanggan'];

        // cek username sudah ada atau belum
	$result = $con->query("SELECT email_pelanggan FROM pelanggan WHERE email_pelanggan = '$email_pelanggan'");

	if (mysqli_fetch_assoc($result) > 0) {
		echo "<script>alert('Username sudah terdaftar');</script>";
		echo "<script>location='?page=login';</script>";
	}

        // enkripsi password
	$password_pelanggan = password_hash($password_pelanggan, PASSWORD_DEFAULT);

        // tambahkan userbaru ke database
	$query = $con->query("INSERT INTO pelanggan VALUES ('','$email_pelanggan', '$password_pelanggan', '$nama_pelanggan', '$telepon_pelanggan', '$alamat_pelanggan')");

	if ($query != 0) {
		echo "<script>alert('Berhasil');</script>";
		echo "<script>window.location.replace('?page=login');</script>";
	} else {
		echo "<script>alert('Gagal');</script>";
		echo "<script>window.location.replace('?page=daftar');</script>";
	}
}
?>