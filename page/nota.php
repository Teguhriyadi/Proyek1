<?php
$ambil = $con->query("SELECT * FROM pembelian join pelanggan on pembelian.id_pelanggan = pelanggan.id_pelanggan where pembelian.id_pembelian='$_GET[id_nota]'");

$detail = $ambil->fetch_assoc();
?>

<?php
$idpelangganyangbeli = $detail["id_pelanggan"];

$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

if ($idpelangganyangbeli!==$idpelangganyanglogin) {
	echo "<script>alert('Dilarang, melihat Data Orang Lain');</script>";
	echo "<script>location='?page=riwayat';</script>";
}
?>
<div class="container " style="padding-top: 20px;">
	<h4><i class="fa fa-search"></i> Detail Nota Pembelian Pelanggan : </h4>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<th colspan="2">Data Nota : </th>
			</tr>
			<tr>
				<td class="techSpecTD1">Nama Pelanggan</td>
				<td class="techSpecTD2"><?php echo $detail['nama_pelanggan']; ?></td>
			</tr>
			<tr>
				<td class="techSpecTD1">No Telepon Pelanggan</td>
				<td class="techSpecTD2"><?php echo $detail['telepon_pelanggan']; ?></td>
			</tr>
			<tr>
				<td class="techSpecTD1">Email Pelanggan</td>
				<td class="techSpecTD2"> <?php echo $detail['email_pelanggan']; ?></td>
			</tr>
			<tr>
				<td class="techSpecTD1">Tanggal Pembelian Barang</td>
				<td class="techSpecTD2"> <?php echo $detail['tanggal_pembelian']; ?></td>
			</tr>
			<tr>
				<td class="techSpecTD1">Total Belanja Keseluruhan</td>
				<td class="techSpecTD2">Rp. <?php echo number_format($detail['total_pembelian']); ?></td>
			</tr>
		</tbody>
	</table>

	<table class="table table-bordered">
		<tbody>
			<tr>
				<th colspan="2">
					<h4>
						Data Nota Pembelian : 
					</h4>
				</th>
			</tr>
			<tr>
				<td>No Pembelian :</td>
				<td>
					<?php echo $detail['id_pembelian']; ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal </td>
				<td>
					<?php echo $detail['tanggal_pembelian']; ?>
				</td>
			</tr>
			<tr>
				<td>Total Belanja :</td>
				<td>
					Rp. <?php echo number_format($detail['total_pembelian']); ?>
				</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th colspan="2">
					<h4>
						Data Nota Pelanggan :
					</h4>
				</th>
			</tr>
			<tr>
				<td>Nama Pelanggan  :</td>
				<td>
					<?php echo $detail['nama_pelanggan']; ?>
				</td>
			</tr>
			<tr>
				<td>Telepon Pelanggan : </td>
				<td>
					<?php echo $detail['telepon_pelanggan']; ?>
				</td>
			</tr>
			<tr>
				<td>Email Pelanggan : </td>
				<td>
					<?php echo $detail['email_pelanggan']; ?>
				</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th colspan="2">
					<h4>
						Data Nota Pengiriman : 
					</h4>
				</th>
			</tr>
			<tr>
				<td>Nama Kota : </td>
				<td>
					<?php echo $detail['nama_kota']; ?>
				</td>
			</tr>
			<tr>
				<td>Ongkos Pengiriman</td>
				<td>
					Rp. <?php echo number_format($detail['tarif']); ?>
				</td>
			</tr>
			<tr>
				<td>Alamat yang di tuju</td>
				<td>
					<?php echo $detail['alamat_pengiriman']; ?>
				</td>
			</tr>
		</tbody>
	</table>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th class="text-center">No.</th>
				<th>Nama Barang</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Jumlah Beli</th>
				<th class="text-center"> Total Harga </th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 0;
			$ambil = $con->query("SELECT * FROM pembelian_barang WHERE id_pembelian='$_GET[id_nota]'");
			while ($pecah = $ambil->fetch_array()) {
				?>
				<tr>
					<td class="text-center"><?php echo ++$no; ?>.</td>
					<td><?php echo $pecah['nama_barang']; ?></td>
					<td class="text-center">Rp. <?php echo number_format($pecah['harga']); ?></td>
					<td class="text-center"><?php echo $pecah['jumlah']; ?></td>
					<?php
						$jum_beli = $pecah['harga'] * $pecah['jumlah'];
					?>
					<td class="text-center">Rp. <?php echo number_format($jum_beli); ?></td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<th colspan="2" class="techSpecRow" style="background-color: blue; color: white;">
					Total Belanja Keseluruhan : Rp. <?php echo number_format($detail['total_pembelian']); ?>
					<br>
					Silahkan Bayar ke PT. Abadi Jaya 
				</th>
			</tr>

		</tbody>
	</table>
</div>