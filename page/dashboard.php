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
		<?php
		$no = 0;
		$query = $con->query("SELECT * FROM barang ORDER BY kode_barang ASC");
		$bgcolor = "";
		if (mysqli_num_rows($query)) {
			while ($data = $query->fetch_array()) {
				if ($no % 2 == 0) {
					$bgcolor = "#F0F0F0";
				} else {
					$bgcolor = "";
				}
				$kdBarang = $data['kode_barang'];

				$sql_masuk = $con->query("select sum(stok) as 'stok' from transaksi_barang where kode_barang = '$kdBarang' and status = 1");
				$data_masuk = $sql_masuk->fetch_array();
				$jum_masuk = $data_masuk['stok'];
				$sql_keluar = $con->query("select sum(stok) as'stok' from transaksi_barang where kode_barang ='$kdBarang' and status = 0 ");
				$data_keluar = $sql_keluar->fetch_array();
				$jum_keluar = $data_keluar['stok'];
				$jumlah_barang = $jum_masuk - $jum_keluar;
                                // $bgcolor = "";

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
						<a href="?page=detail&kode_barang=<?php echo $data['kode_barang'] ?>">
							<i class="fa fa-search"></i> Detail
						</a> |
						<a href="?page=beli">
							<i class="fa fa-shopping-cart"></i> Beli
						</a> |
						Stok : <?php echo $jumlah_barang ?>
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
