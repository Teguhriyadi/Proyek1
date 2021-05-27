<?php
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
	echo "<script>alert('Maaf, Harus Login Terlebih Dahulu');</script>";
	echo "<script>location='?page=login';</script>";
	exit();
}
?>

<div class="container">
	<h4>Riwayat Keranjang Belanja <?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?> </h4>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="text-align: center;">No.</th>
				<th style="text-align: center;">Tanggal Pembelian Barang</th>
				<th>Status Pembayaran Pelanggan</th>
				<th style="text-align: center;">Total Belanja Keseluruhan</th>
				<th style="text-align: center;">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 0; 
			$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"]; 
			$ambil = $con->query("SELECT * FROM pembelian WHERE id_pelanggan = '$id_pelanggan'");
			while ($pecah = $ambil->fetch_assoc()) {
				?>
				<tr>
					<td style="text-align: center;"><?php echo ++$no; ?>.</td>
					<td style="text-align: center;"><?php echo $pecah['tanggal_pembelian']; ?></td>
					<td>
						<?php echo $pecah['status_pembelian']; ?>
						<br>
						<?php if (!empty($pecah['resi_pengiriman'])) : ?>
							Resi : <?php echo $pecah['resi_pengiriman']; ?>
						<?php endif ?>
					</td>
					<td style="text-align: center;">Rp. <?php echo number_format($pecah['total_pembelian']); ?></td>
					<td>
					<a href="?page=nota&id_nota=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">
						<i class="fa fa-search"></i> Lihat Nota
						</a>

						<?php if ($pecah['status_pembelian']=="pending") : ?>
							<a href="?page=pembayaran&id_pembelian=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-success">
								Bayar
							</a>
						<?php else :  ?>
							<a href="?page=lihat_pembayaran&id_pembelian=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-warning">
								Lihat Pembayaran
							</a>
						<?php endif ?>
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
</div>