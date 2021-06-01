<?php

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
	echo "<script>alert('Maaf, Harus Login Terlebih Dahulu');</script>";
	echo "<script>window.location.replace('?page=login');</script>";
}

$idpem = $_GET['id_pembelian'];
$ambil = $con->query("SELECT * FROM pembelian WHERE id_pembelian = '$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pelanggan_beli = $detpem["id_pelanggan"];

$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

if ($id_pelanggan_login !== $id_pelanggan_beli) {
	echo "<script>alert('Dilarang');</script>";
	echo "<script>window.location.replace('?page=dashboard');</script>";
}
?>
<br>
<div class="container">
	<table class="table table-bordered">
		<form method="post" enctype="multipart/form-data">
			<tr class="techSpecRow">
				<th colspan="2">
					<h4>
						<i class="fa fa-map"></i> Konfirmasi Pembayaran
					</h4>
				</th>
			</tr>
			<tr class="techSpecRow">
				<td>Nama Pelanggan</td>
				<td>
					<input type="text" name="nama" class="form-control" required placeholder="Nama Pelanggan" value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>" readonly>
				</td>
			</tr>
			<tr class="techSpecRow">
				<td>Nama Bank</td>
				<td>
					<input type="text" class="form-control" name="bank" required placeholder="Nama Bank" value="PT. IO - Keeper / No. Rek : 12345678910" readonly style="background-color: white;">
				</td>
			</tr>
			<tr class="techSpecRow">
				<td>Jumlah Total Belanja</td>
				<td>
					<input type="number" name="jumlah" class="form-control" readonly="1" value="<?php echo $detpem['total_pembelian']; ?>">
				</td>
			</tr>
			<tr class="techSpecRow">
				<td>Bukti Pembayaran</td>
				<td>
					<input type="file" name="bukti" class="form-control">
				</td>
			</tr>
			<tr class="techSpecRow">
				<td colspan="2">
					<button class="btn btn-primary btn-sm" name="kirim">
						<i class="fa fa-save"></i> Kirim Data
					</button>
					<button class="btn btn-danger btn-sm" type="reset">
						<i class="fa fa-refresh"></i> Reset
					</button>
				</td>
			</tr>
		</form>
		<?php
		if (isset($_POST['kirim'])) {
			$gambar = $_FILES['bukti']['name'];
			$lokasi = $_FILES['bukti']['tmp_name'];
			$fiks = date("YmdHis").$gambar;

			$nama = $_POST['nama'];
			$bank = $_POST['bank'];
			$jumlah = $_POST['jumlah'];
			$tanggal = date("Y-m-d");

			move_uploaded_file($lokasi, "bukti_pembayaran/$fiks");

			$con->query("INSERT INTO pembayaran(id_pembelian,nama_pelanggan,bank,jumlah,tanggal,bukti_pembayaran) VALUES('$idpem','$nama','$bank','$jumlah','$tanggal','$fiks')");

			$con->query("UPDATE pembelian SET status_pembelian = 'sudah kirim pembayaran' WHERE id_pembelian = '$idpem'");

			echo "<script>alert('Terima Kasih Sudah Mengirimkan Bukti Pembayaran');</script>";
			echo "<script>window.location.replace('?page=riwayat');</script>";
		}
		?>
	</table>
</div>