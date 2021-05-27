
<br>
<div class="container">
	<div class="row">
		<?php
		$kode_barang = $_GET['kode_barang'];
		$query = $con->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang' ");
		
		foreach ($query as $edit) {
			# code...
		}

		?>
		<div class="card w-100">
			<div class="card-header">
				Barang <b><?php echo $edit['nama_barang'] ?></b>
			</div>
			<div class="card-body">
				<img src="admin/page/img/<?php echo $edit['foto'] ?>" width="300">
				<form method="POST">
					<input type="number" class="form-control" name="jumlah">
				</form>
			</div>
		</div>
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