<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
	echo "<script>alert('Maaf, Harus Login Terlebih Dahulu');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Riwayat Belanja</title>
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
									<h4>Riwayat Keranjang Belanja <?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?> </h4>
									<table class="table table-bordered">
										<thead>
											<tr>
												<th style="text-align: center;">No.</th>
												<th style="text-align: center;">Tanggal Pembelian Barang</th>
												<th>Status Pembayaran Pelanggan</th>
												<th style="text-align: center;">Total Belanja Keseluruhan</th>
												<th style="text-align: center;">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 0; 
											$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"]; 
											$ambil = $con->query("SELECT * FROM pembelian WHERE id_pelanggan = '$id_pelanggan'");
											while ($pecah = $ambil->fetch_assoc()) {
												?>
												<tr>
													<td style="text-align: center;"><?php echo ++$no; ?>.</td>
													<td style="text-align: center;"><?php echo $pecah['tanggal_pembelian']; ?></td>
													<td>
														<?php echo $pecah['status_pembelian']; ?>
														<br>
														<?php if (!empty($pecah['resi_pengiriman'])) : ?>
															Resi : <?php echo $pecah['resi_pengiriman']; ?>
														<?php endif ?>
													</td>
													<td style="text-align: center;">Rp. <?php echo number_format($pecah['total_pembelian']); ?></td>
													<td>
														<a href="nota.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">
															Lihat Nota
														</a>

														<?php if ($pecah['status_pembelian']=="pending") : ?>
															<a href="pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-success">
																Bayar
															</a>
														<?php else :  ?>
															<a href="lihat_pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-warning">
																Lihat Pembayaran
															</a>
														<?php endif ?>
													</td>
												</tr>
												<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div><br><br>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer ================================================================== -->
	<?php include 'user/footer.php'; ?>
	<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<?php include 'user/js.php'; ?>
</body>
</html>