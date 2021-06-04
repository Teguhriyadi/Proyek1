<?php
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
	echo "<script>alert('Maaf, Harus Login Terlebih Dahulu');</script>";
	echo "<script>location='?page=login';</script>";
	exit();
}
?>

<div class="container" style="padding-top: 20px;">
	<h4><i class="fa fa-pencil"></i> Riwayat Keranjang Belanja <?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?> </h4>
	<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th class="text-center">No.</th>
				<th class="text-center">Tanggal Pembelian Barang</th>
				<th>Status Pembayaran Pelanggan</th>
				<th class="text-center">Total Belanja Keseluruhan</th>
				<th class="text-center">Aksi</th>
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
					<td class="text-center"><?php echo ++$no; ?>.</td>
					<td class="text-center"><?php echo $pecah['tanggal_pembelian']; ?></td>
					<td>
						<?php if ($pecah['status_pembelian'] == "barang_dikirim") : ?>
							Barang Dikirim
						<?php elseif($pecah['status_pembelian'] == "pending") : ?>
							Pending
						<?php elseif($pecah['status_pembelian'] == "sudah kirim pembayaran") : ?>
							Sudah Kirim Pembayaran
						<?php else : ?>
							Tidak Ada
						<?php endif ?>
						<br>
						<?php if (!empty($pecah['resi_pengiriman'])) : ?>
							Resi : <?php echo $pecah['resi_pengiriman']; ?>
						<?php endif ?>
					</td>
					<td class="text-center">Rp. <?php echo number_format($pecah['total_pembelian']); ?></td>
					<td>
					<a href="?page=nota&id_nota=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info btn-sm">
						<i class="fa fa-search"></i> Lihat Nota
						</a>

						<?php if ($pecah['status_pembelian']=="pending") : ?>
							<a href="?page=pembayaran&id_pembelian=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-success btn-sm">
								<i class="fa fa-money"></i> Bayar
							</a>
						<?php else :  ?>
							<a href="?page=lihat_pembayaran&id_pembelian=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-warning btn-sm">
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