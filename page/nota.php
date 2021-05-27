<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Data Nota</title>
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
				<div class="span9">
					<div class="row">	  

						<div class="span12">
							<div id="myTabContent" class="tab-content">
								<div class="tab-pane fade active in" id="home">
									<h4>Detail Nota Pembelian Pelanggan : </h4>
									<?php
									$ambil = $con->query("select * from pembelian join pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan where pembelian.id_pembelian='$_GET[id]'");

									$detail = $ambil->fetch_assoc();
									?>

									<?php
									$idpelangganyangbeli = $detail["id_pelanggan"];

									$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

									if ($idpelangganyangbeli!==$idpelangganyanglogin) {
										echo "<script>alert('Dilarang, melihat Data Orang Lain');</script>";
										echo "<script>location='riwayat.php';</script>";
									}
									?>
									<table class="table table-bordered">
										<tbody>
											<tr class="techSpecRow">
												<th colspan="2">Data Nota : </th>
											</tr>
											<tr class="techSpecRow">
												<td class="techSpecTD1">Nama Pelanggan</td>
												<td class="techSpecTD2"><?php echo $detail['nama_pelanggan']; ?></td>
											</tr>
											<tr class="techSpecRow">
												<td class="techSpecTD1">No Telepon Pelanggan</td>
												<td class="techSpecTD2"><?php echo $detail['telepon_pelanggan']; ?></td>
											</tr>
											<tr class="techSpecRow">
												<td class="techSpecTD1">Email Pelanggan</td>
												<td class="techSpecTD2"> <?php echo $detail['email_pelanggan']; ?></td>
											</tr>
											<tr class="techSpecRow">
												<td class="techSpecTD1">Tanggal Pembelian Barang</td>
												<td class="techSpecTD2"> <?php echo $detail['tanggal_pembelian']; ?></td>
											</tr>
											<tr class="techSpecRow">
												<td class="techSpecTD1">Total Belanja Keseluruhan</td>
												<td class="techSpecTD2">Rp. <?php echo number_format($detail['total_pembelian']); ?></td>
											</tr>
										</tbody>
									</table>

									<table class="table table-bordered">
										<tbody>
											<tr class="techSpecRow">
												<th colspan="2">
													<h4>
														Data Nota Pembelian : 
													</h4>
												</th>
											</tr>
											<tr class="techSpecRow">
												<td>No Pembelian :</td>
												<td>
													<?php echo $detail['id_pembelian']; ?>
												</td>
											</tr>
											<tr class="techSpecRow">
												<td>Tanggal </td>
												<td>
													<?php echo $detail['tanggal_pembelian']; ?>
												</td>
											</tr>
											<tr class="techSpecRow">
												<td>Total Belanja :</td>
												<td>
													Rp. <?php echo number_format($detail['total_pembelian']); ?>
												</td>
											</tr>
										</tbody>
										<tbody>
											<tr class="techSpecRow">
												<th colspan="2">
													<h4>
														Data Nota Pelanggan :
													</h4>
												</th>
											</tr>
											<tr class="techSpecRow">
												<td>Nama Pelanggan  :</td>
												<td>
													<?php echo $detail['nama_pelanggan']; ?>
												</td>
											</tr>
											<tr class="techSpecRow">
												<td>Telepon Pelanggan : </td>
												<td>
													<?php echo $detail['telepon_pelanggan']; ?>
												</td>
											</tr>
											<tr class="techSpecRow">
												<td>Email Pelanggan : </td>
												<td>
													<?php echo $detail['email_pelanggan']; ?>
												</td>
											</tr>
										</tbody>
										<tbody>
											<tr class="techSpecRow">
												<th colspan="2">
													<h4>
														Data Nota Pengiriman : 
													</h4>
												</th>
											</tr>
											<tr class="techSpecRow">
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
											<tr class="techSpecRow">
												<td>Alamat yang di tuju</td>
												<td>
													<?php echo $detail['alamat_pengiriman']; ?>
												</td>
											</tr>
										</tbody>
									</table>
									<table class="table table-bordered"></table>
									<table class="table table-bordered">
										<thead>
											<tr>
												<th style="text-align: center;">No.</th>
												<th>Nama Produk</th>
												<th style="text-align: center; width: 100px;">Harga Produk</th>
												<th style="text-align: center; width: 120px;">Muatan Produk</th>
												<th style="text-align: center; width: 90px;">Jumlah beli</th>
												<th style="text-align: center; width: 70px;">Total Berat</th>
												<th style="text-align: center;">Total Harga Pembelian</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 0;
											$ambil = $con->query("select * from pembelian_produk where id_pembelian='$_GET[id]'");
											while ($pecah = $ambil->fetch_array()) {
												?>
												<tr>
													<td style="text-align: center;"><?php echo ++$no; ?>.</td>
													<td><?php echo $pecah['nama']; ?></td>
													<td style="text-align: center;">Rp. <?php echo number_format($pecah['harga']); ?></td>
													<td style="text-align: center;"><?php echo $pecah['berat']; ?></td>
													<td style="text-align: center;"><?php echo $pecah['jumlah']; ?></td>
													<td style="text-align: center;"><?php echo $pecah['subberat']; ?></td>
													<td style="text-align: center;">Rp. <?php echo number_format($pecah['subharga']); ?></td>
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