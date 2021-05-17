<section class="jumbotron-bg">
	<div class="jumbotron warna-bg text-white">
		<div class="container">
			<h1 class="display-4">Kontak / Hubungi Kami</h1>
			<p class="lead">Aplikasi Ini di lengkapi dengan fitur kontak. Dengan tujuan agar semua pengguna aplikasi ini dapat mengetahui informasi terkait <br><b><i>IO - Keeper</i></b></p>
		</div>
	</div>
</section>

<div class="container">
	<div class="row">
		<div class="col-md-12 mb-4">
			<div class="card">
				<div class="card-body">
					<h3>Info Terkait</h3>
					<hr>
					<table>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>
								IO - Keeper
							</td>
						</tr>
						<tr>
							<td>No. Handphone</td>
							<td>:</td>
							<td>0812-1478-0972</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>Villa Intan Blok E No. 06 Klayan Cirebon</td>
						</tr>
					</table>
				</div>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-12 mb-4">
			<div class="card">
				<div class="card-header">
					<h3>Saran & Masukan</h3>
				</div>
				<div class="card-body">
					<form method="POST">
						<div class="form-group">
							<label for="nama"> Nama </label>
							<input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Nama">
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="email"> Email </label>
									<input type="email" id="email" class="form-control" name="email" placeholder="Masukkan Email">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="no_telepon"> No. Telepon </label>
									<input type="text" id="no_telepon" class="form-control" name="no_telepon" placeholder="Masukkan No. Telepon">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="keterangan"> Keterangan </label>
							<textarea id="keterangan" class="form-control" name="keterangan" placeholder="Masukkan Keterangan" rows="4"></textarea>
						</div>
						<hr>
						<div class="form-group">
							<button type="submit" name="btn-kirim" class="btn btn-primary btn-sm">
								Kirim
							</button>
							<button type="reset" class="btn btn-danger btn-sm">
								Batal
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Fungsi Tambah Data -->

<?php
	if (isset($_POST['btn-kirim'])) {
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$no_telepon = $_POST['no_telepon'];
		date_default_timezone_set('Asia/Jakarta');
		$created_at = date("d-m-y H:i:s");
		$keterangan = $_POST['keterangan'];

		$query = $con->query("INSERT INTO saran VALUES('','$nama','$email','$no_telepon','$created_at','$keterangan')");

		if ($query != 0) {
			echo "<script>alert('Data Berhasil di Tambahkan');</script>";
			echo "<script>window.location.replace('?page=contact');</script>";
		} else {
			echo "<script>alert('Data Gagal di Tambahkan');</script>";
			echo "<script>window.location.replace('?page=contact');</script>";
		}
	}
?>