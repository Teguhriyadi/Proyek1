<section class="jumbotron-bg">
	<div class="jumbotron warna-bg text-white">
		<div class="container">
			<h1 class="display-4">
				Selamat Datang  
			</h1>
			<p class="lead">di <b>Aplikasi IO - Keeper Berbasis Web</b>. Silahkan pilih menu untuk memulai program</p>
		</div>
	</div>
</section>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h1><i class="fa fa-shopping-cart"></i> Produk</h1>
		</div>
	</div>
	<hr>
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
				<div class="col-md-3 mb-2">
					<div class="card">
						<?php if ($data['foto'] == "") : ?>
							<img class="card-img-top" src="admin/img/cart.jpg" alt="Card image cap">
						<?php else : ?>
							<img class="card-img-top" src="admin/page/img/<?php echo $data['foto']; ?>" alt="Card image cap">
						<?php endif ?>
						<div class="card-body">
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
</div>
