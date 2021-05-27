<?php
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
	echo "<script>alert('Data Keranjang Tidak Ada');</script>";
	echo "<script>location='?page=dashboard';</script>";
}
?>

<br>
<div class="container">
	<h3> Keranjang Belanja 
	<a href="?page=dashboard" class="btn btn-success btn-sm pull-right"><i class="icon-arrow-left"></i> 
			Lanjutkan Belanja 
		</a>
	</h3>
	<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th class="text-center">No.</th>
				<th>Nama Barang</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Jumlah</th>
				<th class="text-center">Total Harga</th>
				<th class="text-center">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 0; ?>
			<?php foreach ($_SESSION["keranjang"] as $kode_barang => $jumlah): ?>
				<?php
				$ambil = $con->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
				$pecah = $ambil->fetch_assoc();

				$subharga = $pecah["harga"] * $jumlah;
				?>
				<tr>
					<td style="text-align: center;"><?php echo ++$no; ?>.</td>
					<td><?php echo $pecah['nama_barang']; ?></td>
					<td style="text-align: center;">Rp. <?php echo number_format($pecah['harga']); ?></td>
					<td style="text-align: center;">
						<?php echo $jumlah; ?>
					</td>
					<td style="text-align: center;">Rp. <?php echo number_format($subharga); ?></td>
					<td style="text-align: center;">
						<a href="?page=hapus_keranjang&kode_barang=<?php echo $kode_barang; ?>" class="btn btn-danger">
							Hapus
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<a href="?page=checkout" class="btn btn-primary">
		Checkout
	</a>
</div>
<br>