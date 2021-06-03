
<br>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<i class="fa fa-shopping-cart"></i> Data Barang
				</div>
				<div class="card-body">
					<div class="row">
						<?php
						$no = 0;
						$query = $con->query("SELECT * FROM barang ORDER BY kode_barang ASC");
						if (mysqli_num_rows($query)) {
							while ($data = $query->fetch_array()) {
								$kdBarang = $data['kode_barang'];

								$sql_masuk = $con->query("select sum(stok) as 'stok' from transaksi_barang where kode_barang = '$kdBarang' and status = 1");
								$data_masuk = $sql_masuk->fetch_array();
								$jum_masuk = $data_masuk['stok'];

								$sql_keluar = $con->query("select sum(stok) as'stok' from transaksi_barang where kode_barang ='$kdBarang' and status = 0 ");
								$data_keluar = $sql_keluar->fetch_array();
								$jum_keluar = $data_keluar['stok'];

								$sql_beli_masuk = $con->query("SELECT sum(jumlah) as 'jumlah_masuk' FROM pembelian_barang WHERE kode_barang = '$kdBarang'");

								$data_beli_masuk = $sql_beli_masuk->fetch_array();
								$jum_beli_masuk = $data_beli_masuk['jumlah_masuk'];
								$jum = $jum_masuk - $jum_keluar - $jum_beli_masuk;

								?>
								<div class="col-md-4">
									<div class="card mb-4">
										<div class="card-body">
											<img class="card-img-top" src="admin/page/img/<?php echo $data['foto']; ?>" alt="Card image cap">
											<h6 class="card-title text-info"><?php echo $data['nama_barang']; ?></h6>
											<h5 class="card-text"><a href="#" class="text-primary">Rp. <?php echo number_format($data['harga']) ?></a></h5>
										</div>
										<div class="card-footer">
											<a class="btn btn-success btn-sm" href="?page=detail&kode_barang=<?php echo $data['kode_barang']; ?>">
												<i class="fa fa-search"></i> Detail
											</a> |
											<a class="btn btn-primary btn-sm" href="?page=beli&kode_barang=<?php echo $data['kode_barang']; ?>">
												<i class="fa fa-shopping-cart"></i> Beli
											</a> |
											Stok : <?php echo $jum ?>
										</div>
									</div>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">

			<?php
			$kode_barang = $_GET['kode_barang'];
			$query = $con->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang' ");

			foreach ($query as $edit) {
				$sql_masuk = $con->query("select sum(stok) as 'stok' from transaksi_barang where kode_barang = '$kode_barang' and status = 1");
				$data_masuk = $sql_masuk->fetch_array();
				$jum_masuk = $data_masuk['stok'];

				$sql_keluar = $con->query("select sum(stok) as'stok' from transaksi_barang where kode_barang ='$kode_barang' and status = 0 ");
				$data_keluar = $sql_keluar->fetch_array();
				$jum_keluar = $data_keluar['stok'];

				$sql_beli_masuk = $con->query("SELECT sum(jumlah) as 'jumlah_masuk' FROM pembelian_barang WHERE kode_barang = '$kode_barang'");

				$data_beli_masuk = $sql_beli_masuk->fetch_array();
				$jum_beli_masuk = $data_beli_masuk['jumlah_masuk'];
				$jum = $jum_masuk - $jum_keluar - $jum_beli_masuk;
			}

			?>
			<div class="card w-100">
				<div class="card-header">
					Barang <b><?php echo $edit['nama_barang'] ?></b>
				</div>
				<div class="card-body">
					<img src="admin/page/img/<?php echo $edit['foto'] ?>" width="300">
					<h6 class="card-title text-info"><?php echo $edit['nama_barang']; ?></h6>
					<h5 class="card-text"><a href="#" class="text-primary">Rp. <?php echo number_format($edit['harga']) ?></a></h5>
					<form method="POST">
						<input type="number" class="form-control" name="jumlah" min="1" autocomplete="off" max="<?php echo $jum ?>" placeholder="0">
						<br>
						<button type="submit" name="beli" class="btn btn-primary btn-sm btn-block">
							<i class="fa fa-shopping-cart"></i> Beli
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST['beli'])) {
	$jumlah = $_POST['jumlah'];
	$_SESSION['keranjang'][$kode_barang] = $jumlah;	

	echo "<script>alert('Pesanan Sudah Masuk ke Keranjang');</script>";
	echo "<script>location='?page=keranjang';</script>";	
}
?>