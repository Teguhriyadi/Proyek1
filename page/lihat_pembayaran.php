<?php
	session_start();
	include 'koneksi.php';

	$id_pembelian = $_GET['id'];

	$ambil = $con->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian = '$id_pembelian'");
	$detbay = $ambil->fetch_assoc();

	if (empty($detbay)) {
		echo "<script>alert('Belum Ada Data Pembayaran');</script>";
		echo "<script>location='riwayat.php';</script>";
		exit();
	}

	if ($_SESSION["pelanggan"]["id_pelanggan"]!==$detbay["id_pelanggan"]) {
		echo "<script>alert('Anda Tidak Berhak melihat Pembayaran Orang Lain');</script>";
		echo "<script>location='riwayat.php';</script>";
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Data Pembayaran</title>
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
						<li><a href="index1.php">Home</a> </li>
					</ul>
					<div class="row">	  
						<div id="gallery" class="span3">
							<a href="foto/<?php echo $detail['foto_produk']; ?>" title="<?php echo $detail['nama_produk']; ?>">
								<img src="bukti_pembayaran/<?php echo $detbay['bukti']; ?>" style="width:100%; height: 200px;" alt="<?php echo $detail['nama_produk']; ?>">
							</a>
						</div>
						<div class="span9">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Bank</th>
										<th>Tanggal</th>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $detbay['nama']; ?></td>
										<td><?php echo $detbay['bank']; ?></td>
										<td><?php echo $detbay['tanggal']; ?></td>
										<td>Rp. <?php echo number_format($detbay['jumlah']); ?></td>
									</tr>
								</tbody>
							</table>
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