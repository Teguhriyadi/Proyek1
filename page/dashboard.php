<section class="jumbotron-bg">
	<div class="jumbotron warna-bg text-white">
		<div class="container">
			<h1 class="display-4">
				Selamat Datang  
			</h1>
			<p class="lead">di <b>Aplikasi IO - Keeper Berbasis Web</b>. Silahkan pilih menu untuk memulai program</p>
		</div>
	</div>
</section>

<div class="container">
	<div class="row">
		<?php
		$query = $con->query("SELECT * FROM barang");
		?>
		<?php foreach ($query as $data) : ?>

			<div class="col-md-3 mb-2">
				<div class="card">
					<?php if ($data['foto'] == "") : ?>
						<img class="card-img-top" src="admin/img/cart.jpg" alt="Card image cap">
					<?php else : ?>
						<img class="card-img-top" src="admin/page/img/<?php echo $data['foto']; ?>" alt="Card image cap">
					<?php endif ?>
					<div class="card-body">
						<h6 class="card-title text-info"><?php echo $data['nama_barang']; ?></h6>
						<h5 class="card-text"><a href="#" class="text-primary">Rp. <?php echo number_format($data['harga']) ?></a></h5>
					</div>
					<div class="card-footer">
						<a href="?page=detail&kode_barang=<?php echo $data['kode_barang']; ?>">
							<i class="fa fa-search"></i> Detail
						</a>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>

<nav aria-label="Page navigation example">
	<ul class="pagination justify-content-center">
		<li class="page-item"><a class="page-link" href="#">Previous</a></li>
		<li class="page-item"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item"><a class="page-link" href="#">Next</a></li>
	</ul>
</nav>

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