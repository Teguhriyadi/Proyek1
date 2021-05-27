<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"])) {
	echo "<script>alert('Maaf, Anda Harus Login Dahulu');</script>";
	echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Checkout</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<?php include 'user/style.php'; ?>
</head>
<body>
	<div id="header">
		<?php include 'user/container.php'; ?>
	</div>
	<div id="mainBody">
		<div class="container">
			<div class="row">
				<!-- Sidebar end=============================================== -->
				<div class="span12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
					</ul>
					<div class="row">

						<div class="span12">
							<div id="myTabContent" class="tab-content">
								<div class="tab-pane fade active in" id="home">
									<h4>Data Checkout</h4>
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
											<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
												<?php
												$ambil = $con->query("select * from barang where id_produk = '$id_produk'");
												$pecah = $ambil->fetch_assoc();

												$subharga = $pecah["harga_produk"] * $jumlah;
												?>
												<tr>
													<td style="text-align: center;"><?php echo ++$no; ?></td>
													<td><?php echo $pecah['nama_produk']; ?></td>
													<td style="text-align: center;">Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
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
											<tr class="techSpecRow">
												<th colspan="2">
													<h4>Data Pelanggan : </h4>
												</th>
											</tr>
											<tr class="techSpecRow">
												<td>Nama Pelanggan Yang Beli : </td>
												<td>
													<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>
												</td>
											</tr>
											<tr class="techSpecRow">
												<td>Telepon Pelanggan</td>
												<td>
													<?php echo $_SESSION['pelanggan']['telepon_pelanggan']; ?>
												</td>
											</tr>
											<tr class="techSpecRow">
												<td>Pilih Ongkir : </td>
												<td>
													<select name="id_ongkir" class="span3">
														<option value="">- Pilih Ongkir -</option>
														<?php
														$sql = $con->query("SELECT * FROM pengiriman");
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
											<tr class="techSpecRow">
												<td>Alamat Lengkap :</td>
												<td>
													<textarea name="alamat_pengiriman" class="span10" placeholder="Alamat Lengkap"></textarea>
												</td>
											</tr>
											<tr class="techSpecRow">
												<th colspan="2">
													<button class="btn btn-primary" name="print">
														Checkout
													</button>
												</th>
											</tr>
										</form>
										<?php
										if (isset($_POST['print'])) {
											$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
											$id_ongkir = $_POST["id_ongkir"];
											$tanggal_pembelian = date("Y-m-d");
											$alamat_pengiriman = $_POST['alamat_pengiriman'];

											$ambil = $con->query("SELECT * FROM pengiriman where id_ongkir = '$id_ongkir'");
											$arrayongkir = $ambil->fetch_assoc();
											$nama_kota = $arrayongkir['nama_kota'];
											$tarif = $arrayongkir["tarif"];

											$total_pembelian = $totalbelanja + $tarif;

											$con->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");

											$id_pembelian_baru = $con->insert_id;

											foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {

												$ambil = $con->query("SELECT * FROM barang WHERE id_produk = '$id_produk'");
												$perproduk = $ambil->fetch_assoc();
												$nama = $perproduk['nama_produk'];
												$harga = $perproduk['harga_produk'];
												$berat = $perproduk['berat'];
												$subberat = $perproduk['berat']*$jumlah;
												$subharga = $perproduk['harga_produk']*$jumlah;
												$con->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah) VALUES('$id_pembelian_baru','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");

												$con->query("UPDATE barang SET stok_produk = stok_produk - $jumlah WHERE id_produk = '$id_produk'");
											}

											unset($_SESSION["keranjang"]);

											echo "<script>alert('Pembelian Berhasil');</script>";
											echo "<script>location='nota.php?id=$id_pembelian_baru';</script>";
										}
										?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer ================================================================== -->
	<?php include 'user/footer.php'; ?>
	<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<?php include 'user/js.php'; ?>

	<!-- Themes switcher section ============================================================================================= -->
	<div id="secectionBox">
		<link rel="stylesheet" href="bootshop/tema/themes/switch/themeswitch.css" type="text/css" media="screen" />
		<script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
		<div id="themeContainer">
			<div id="hideme" class="themeTitle">Style Selector</div>
			<div class="themeName">Oregional Skin</div>
			<div class="images style">
				<a href="themes/css/#" name="bootshop"><img src="bootshop/tema/themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
				<a href="themes/css/#" name="businessltd"><img src="bootshop/tema/themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
			</div>
			<div class="themeName">Bootswatch Skins (11)</div>
			<?php include 'user/image-style.php'; ?>
			<div class="themeName">Background Patterns </div>
			<?php include 'style/patterns.php'; ?>
		</div>
	</div>
	<span id="themesBtn"></span>
</body>
</html>