<section class="jumbotron-bg">
	<div class="jumbotron warna-bg text-white">
		<div class="container">
			<h1 class="display-4">Informasi</h1>
			<p class="lead">Fitur <i>Informasi</i> berguna untuk <b><i>informan</i></b> memberi tahu kepada admin terkait ada promo barang atau sebagainya. </p>
		</div>
	</div>
</section>

<div class="container">
	<div class="row">
		<div class="col-md-12 mb-4">
			<div class="card">
				<div class="card-body">
					<form method="POST" action="?page=aksi-simpan-informasi">
						<div class="form-group">
							<label for="nama_informasi">Nama Informasi</label>
							<input type="text" class="form-control" id="nama_informasi" name="nama_informasi" placeholder="Contoh : Promo / Diskon">
						</div>
						<div class="form-group">
							<label for="alamat">Keterangan</label>
							<textarea class="form-control" id="alamat" name="keterangan" rows="5" placeholder="Masukkan Keterangan"></textarea>
						</div>
						<div class="form-group">
							<label for="nama_user"> Nama User </label>
							<input type="text" id="nama_user" class="form-control" name="nama_user" value="<?php echo $_SESSION['username']; ?>" readonly>
						</div>
						<hr>
						<button type="reset" class="btn btn-danger btn-sm"> Cancel </button>
						<button type="submit" name="btn-kirim" class="btn btn-primary btn-sm"> Kirim </button>
					</form>
				</div>
			</div>
		</div>	
	</div>
</div>

<div class="jumbotron jumbotron-fluid bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="" class="img-thumbnail">
			</div>
			<div class="col-md-9">
				<h2>Mohammad Ilham Teguhriyadi</h2>
				<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<button class="btn btn-primary">Download</button>
			</div>
		</div>
	</div>
</div>