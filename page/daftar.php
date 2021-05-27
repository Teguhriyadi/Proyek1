<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Daftar Pelanggan</title>
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
					<h3>Daftar</h3>
					<hr class="soft">
					<div class="row">
						<div class="span12">
							<div class="well">
								<h5>Isikan Data Baru Dengan Benar</h5>
								<form method="post">
									<div class="control-group">
										<label class="control-label" for="inputEmail1">Email</label>
										<div class="controls">
											<input class="span11" type="text" name="email_pelanggan" id="inputEmail1" placeholder="Email" class="form-control">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword1">Password</label>
										<div class="controls">
											<input type="password" name="password_pelanggan" class="span11" id="inputPassword1" placeholder="Password" class="form-control">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Nama Pelanggan</label>
										<div class="controls">
											<input type="text" name="nama_pelanggan" class="form-control span11" placeholder="Nama Pelanggan">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Telepon Pelanggan</label>
										<div class="controls">
											<input type="text" name="telepon_pelanggan" class="form-control span11" placeholder="Telepon Pelanggan">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Alamat Pelanggan</label>
										<div class="controls">
											<input type="text" name="alamat_pelanggan" class="form-control span11" placeholder="Alamat Pelanggan">
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<button type="submit" class="btn btn-primary" name="baru">Daftar</button>
											<button type="reset" class="btn btn-danger">Batal</button>
										</div>
									</div>
								</form>
								<?php
									if (isset($_POST['baru'])) {
										$email_pelanggan = $_POST['email_pelanggan'];
										$password_pelanggan = $_POST['password_pelanggan'];
										$nama_pelanggan = $_POST['nama_pelanggan'];
										$telepon_pelanggan = $_POST['telepon_pelanggan'];
										$alamat_pelanggan = $_POST['alamat_pelanggan'];

										$query = $con->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email_pelanggan'");
										$rows = $query->num_rows;

										if ($rows==1) {
											echo "<script>alert('Gagal Mendaftar Baru, Email ini sudah digunakan');</script>";
											echo "<script>location='daftar1.php';</script>";
										} else {
											$con->query("INSERT INTO pelanggan VALUES('','$email_pelanggan','$password_pelanggan','$nama_pelanggan','$telepon_pelanggan','$alamat_pelanggan')");

											echo "<script>alert('Daftar Berhasil, Silahkan Login Dahulu');</script>";
											echo "<script>location='login.php';</script>";
										}
									}
								?>
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