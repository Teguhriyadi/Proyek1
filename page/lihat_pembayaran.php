<?php

$id_pembelian = $_GET['id_pembelian'];

$ambil = $con->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian = '$id_pembelian'");
$detbay = $ambil->fetch_assoc();

if (empty($detbay)) {
	echo "<script>alert('Belum Ada Data Pembayaran');</script>";
	echo "<script>window.location.replace('?page=pembayaran');</script>";
	exit();
}

if ($_SESSION["pelanggan"]["id_pelanggan"]!==$detbay["id_pelanggan"]) {
	echo "<script>alert('Anda Tidak Berhak melihat Pembayaran Orang Lain');</script>";
	echo "<script>window.location.replace('?page=riwayat');</script>";
	exit();
}
?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<img src="bukti_pembayaran/<?php echo $detbay['bukti_pembayaran']; ?>">
		</div>
		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Bank</th>
						<th>Tanggal</th>
						<th>Jumlah</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $detbay['nama_pelanggan']; ?></td>
						<td><?php echo $detbay['bank']; ?></td>
						<td><?php echo $detbay['tanggal']; ?></td>
						<td>Rp. <?php echo number_format($detbay['jumlah']); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<br>