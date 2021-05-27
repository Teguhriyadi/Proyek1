<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
	echo "<script>alert('Maaf, Harus Login Terlebih Dahulu');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

$idpem = $_GET['id'];
$ambil = $con->query("SELECT * FROM pembelian WHERE id_pembelian = '$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pelanggan_beli = $detpem["id_pelanggan"];

$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

if ($id_pelanggan_login !==$id_pelanggan_beli) {
	echo "<script>alert('Dilarang');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kirim Pembayaran</title>
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
									<table class="table table-bordered">
										<form method="post" enctype="multipart/form-data">
											<tr class="techSpecRow">
												<th colspan="2">
													<h4>
														Konfirmasi Pembayaran
													</h4>
												</th>
											</tr>
											<tr class="techSpecRow">
												<td>Nama Pelanggan</td>
												<td>
													<input type="text" name="nama" class="span10" required placeholder="Nama Pelanggan">
												</td>
											</tr>
											<tr class="techSpecRow">
												<td>Nama Bank</td>
												<td>
													<input type="text" class="span10" name="bank" required placeholder="Nama Bank" value="PT. Jaya Abadi" readonly style="background-color: white;">
												</td>
											</tr>
											<tr class="techSpecRow">
												<td>Jumlah Total Belanja</td>
												<td>
													<input type="number" name="jumlah" class="span10" readonly="1" value="<?php echo $detpem['total_pembelian']; ?>">
												</td>
											</tr>
											<tr class="techSpecRow">
												<td>Bukti Pembayaran</td>
												<td>
													<input type="file" name="bukti" class="span10">
												</td>
											</tr>
											<tr class="techSpecRow">
												<td colspan="2">
													<button class="btn btn-primary" name="kirim">
														Kirim Data
													</button>
													<button class="btn btn-danger" type="reset">
														Reset
													</button>
												</td>
											</tr>
										</form>
										<?php
										if (isset($_POST['kirim'])) {
											$gambar = $_FILES['bukti']['name'];
											$lokasi = $_FILES['bukti']['tmp_name'];
											$fiks = date("YmdHis").$gambar;

											$nama = $_POST['nama'];
											$bank = $_POST['bank'];
											$jumlah = $_POST['jumlah'];
											$tanggal = date("Y-m-d");

											move_uploaded_file($lokasi, "bukti_pembayaran/$fiks");

											$con->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES('$idpem','$nama','$bank','$jumlah','$tanggal','$fiks')");

											$con->query("UPDATE pembelian SET status_pembelian = 'sudah kirim pembayaran' WHERE id_pembelian = '$idpem'");

											echo "<script>alert('Terima Kasih Sudah Mengirimkan Bukti Pembayaran');</script>";
											echo "<script>location='riwayat.php';</script>";
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