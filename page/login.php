<?php 
session_start();
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
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
				
				<?php include 'user/sidebar.php'; ?>
				<!-- Sidebar end=============================================== -->
				<div class="span9">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a> <span class="divider">/</span></li>
						<li class="active"> Login</li>
					</ul>
					<h3>Login</h3>
					<hr class="soft">
					<div class="row">
						<div class="span9">
							<div class="well">
								<h5>Isikan Data Login dengan Benar</h5>
								<form method="post">
									<div class="control-group">
										<label class="control-label" for="inputEmail1">Email</label>
										<div class="controls">
											<input class="span8" type="text" name="email_pelanggan" id="inputEmail1" placeholder="Email" class="form-control">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword1">Password</label>
										<div class="controls">
											<input type="password" name="password_pelanggan" class="span8" id="inputPassword1" placeholder="Password" class="form-control">
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<button type="submit" class="btn btn-primary" name="login">Login</button>
											<button type="reset" class="btn btn-danger">Batal</button>
										</div>
									</div>
								</form>

								<?php
								if (isset($_POST['login'])) {
									$email_pelanggan = $_POST['email_pelanggan'];
									$password_pelanggan = $_POST['password_pelanggan'];
									$sql = $con->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email_pelanggan' AND password_pelanggan = '$password_pelanggan'");

									$akun = $sql->num_rows;

									if ($akun==1) {
										$anggota = $sql->fetch_assoc();

										$_SESSION['pelanggan'] = $anggota;
										echo "<script>alert('Berhasil Login');</script>";

										if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {
											echo "<script>location='checkout.php';</script>";
										} else {
											echo "<script>location='riwayat.php';</script>";
										}
									} else {
										echo "<script>alert('Gagal Login');</script>";
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