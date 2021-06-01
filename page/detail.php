
<br>
<div class="container">
	<div class="row">
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
				<br><br>
				<form method="POST">
					<input type="number" class="form-control" name="jumlah" min="1" autocomplete="off" max="<?php echo $jum ?>">
					<br>
					<button type="submit" name="beli" class="btn btn-primary btn-sm btn-block">
						<i class="fa fa-shopping-cart"></i> Beli
					</button>
				</form>
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