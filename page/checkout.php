<?php
if (!isset($_SESSION["pelanggan"])) {
	echo "<script>alert('Maaf, Anda Harus Login Dahulu');</script>";
	echo "<script>window.location.replace('?page=login');</script>";
} else if (!isset($_SESSION['keranjang'])) {
	echo "<script>alert('Tidak Ada Checkout');</script>";
	echo "<script>window.location.replace('?page=dashboard');</script>";
}
?>
<br>
<div class="container">
	<h4><i class="fa fa-folder-open"></i> Data Checkout</h4>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="text-align: center;">No.</th>
				<th>Nama Produk</th>
				<th style="text-align: center;">Harga Produk</th>
				<th style="text-align: center;">Jumlah Produk</th>
				<th style="text-align: center;">Total Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 0; ?>
			<?php $totalbelanja = 0; ?>
			<?php foreach ($_SESSION["keranjang"] as $kode_barang => $jumlah): ?>
				<?php
				$ambil = $con->query("select * from barang where kode_barang = '$kode_barang'");
				$pecah = $ambil->fetch_assoc();

				$subharga = $pecah["harga"] * $jumlah;
				?>
				<tr>
					<td style="text-align: center;"><?php echo ++$no; ?></td>
					<td><?php echo $pecah['nama_barang']; ?></td>
					<td style="text-align: center;">Rp. <?php echo number_format($pecah['harga']); ?></td>
					<td style="text-align: center;"><?php echo $jumlah; ?></td>
					<td style="text-align: center;">Rp. <?php echo number_format($subharga); ?></td>
				</tr>
				<?php $totalbelanja+=$subharga; ?>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4" style="text-align: center;">Total Belanja : </th>
				<th style="text-align: center;">Rp. <?php echo number_format($totalbelanja); ?> </th>
			</tr>
		</tfoot>
	</table>

	<table class="table table-bordered">
		<form method="post">
			<tr>
				<th colspan="2">
					<h4><i class="fa fa-user"></i> Data Pelanggan : </h4>
				</th>
			</tr>
			<tr>
				<td>Nama Pelanggan Yang Beli : </td>
				<td>
					<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>
				</td>
			</tr>
			<tr>
				<td>Telepon Pelanggan</td>
				<td>
					<?php echo $_SESSION['pelanggan']['telepon_pelanggan']; ?>
				</td>
			</tr>
			<tr>
				<td>Pilih Ongkir : </td>
				<td>
					<select name="id_ongkir" class="form-control">
						<option value="">- Pilih Ongkir -</option>
						<?php
						$sql = $con->query("SELECT * FROM pengiriman ORDER BY nama_kota");
						while ($data = $sql->fetch_array()) {
							?>
							<option value="<?php echo $data['id_ongkir']; ?>">
								<?php echo $data['nama_kota']; ?> - Rp. <?php echo number_format($data['tarif']); ?>
							</option>
							<?php
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat Lengkap :</td>
				<td>
					<textarea name="alamat_pengiriman" class="form-control" rows="4" placeholder="Alamat Lengkap"></textarea>
				</td>
			</tr>
			<tr>
				<th colspan="2">
					<button class="btn btn-primary btn-sm" name="print">
						<i class="fa fa-sign-out"></i> Checkout
					</button>
				</th>
			</tr>
		</form>
		<?php
		if (isset($_POST['print'])) {
			$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
			$id_ongkir = $_POST["id_ongkir"];
			date_default_timezone_set("Asia/Jakarta");
			$tanggal_pembelian = date("Y-m-d H:i:s");
			$alamat_pengiriman = $_POST['alamat_pengiriman'];

			$ambil = $con->query("SELECT * FROM pengiriman where id_ongkir = '$id_ongkir'");
			$arrayongkir = $ambil->fetch_assoc();
			$nama_kota = $arrayongkir['nama_kota'];
			$tarif = $arrayongkir["tarif"];

			$total_pembelian = $totalbelanja + $tarif;

			$con->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");

			$id_pembelian_baru = $con->insert_id;

			foreach ($_SESSION["keranjang"] as $kode_barang => $jumlah) {

				$ambil = $con->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
				$perproduk = $ambil->fetch_assoc();
				$nama = $perproduk['nama_barang'];
				$harga = $perproduk['harga'];
				$con->query("INSERT INTO pembelian_barang (id_pembelian, kode_barang, jumlah , nama_barang, harga) VALUES ('$id_pembelian_baru','$kode_barang','$jumlah','$nama','$harga')");
			}

			unset($_SESSION["keranjang"]);

			echo "<script>alert('Pembelian Berhasil');</script>";
			echo "<script>location='?page=nota&id_nota=$id_pembelian_baru';</script>";
		}
		?>
	</table>
</div>