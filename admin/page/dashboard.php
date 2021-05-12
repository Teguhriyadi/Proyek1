<?php
$produk = $con->query("SELECT * FROM barang");
while($row = $produk->fetch_array()){
	$nama_produk[] = $row['nama_barang'];

	$sql_masuk = $con->query("select sum(stok) as 'stok' from transaksi_barang where kode_barang = '".$row['kode_barang']."' and status = 1");
	$data_masuk = $sql_masuk->fetch_array();
	$jum_masuk = $data_masuk['stok'];
	$sql_keluar = $con->query("select sum(stok) as'stok' from transaksi_barang where kode_barang = '".$row['kode_barang']."' and status = 0 ");
	$data_keluar = $sql_keluar->fetch_array();
	$jum_keluar = $data_keluar['stok'];
	$jumlah_barang = $jum_masuk - $jum_keluar;
	$jumlah_produk[] = $jumlah_barang;
}
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="fa fa-dashboard"></i> Dashboard </h3>
			<br>
		</div>
	</div>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="#">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">My Dashboard</li>
	</ol>
	<!-- Icon Cards-->
	<div class="row">
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-fw fa-bars"></i>
					</div>
					<div class="mr-5">
						<?php
		                	$sql = "SELECT * FROM kategori";
		                	$query = mysqli_query($con,$sql);
		                	$count = mysqli_num_rows($query);
		                	echo $count;
		                ?> Data Kategori
					</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
					<span class="float-left">Lihat Lebih Lengkap</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-fw fa-users"></i>
					</div>
					<div class="mr-5">
					<?php
		                $sql = "SELECT * FROM supplier";
			            $query = mysqli_query($con,$sql);
			            $count = mysqli_num_rows($query);
			            echo $count;
		            ?> Data Supplier!
					</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
					<span class="float-left">Lihat Lebih Lengkap</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-fw fa-folder-open"></i>
					</div>
					<div class="mr-5">
					<?php
		                $sql = "SELECT * FROM barang";
		                $query = mysqli_query($con,$sql);
		                $count = mysqli_num_rows($query);
		                echo $count;
	                ?> Data Barang!
	                </div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
					<span class="float-left">Lihat Lebih Lengkap</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-danger o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-fw fa-support"></i>
					</div>
					<div class="mr-5">13 New Tickets!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-3">
				<div class="card-header">
					Grafik Penjualan
				</div>
				<div class="card-body">
					<canvas id="myChart"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-7">
			<div class="card mb-3">
				<div class="card-header">
					<b><i>Data Barang Yang Kosong</i></b>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th class="text-center">Kode Barang</th>
									<th>Nama Barang</th>
									<th class="text-center">Stok</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no =  0;
									$query = $con->query("SELECT * FROM barang ORDER BY kode_barang ASC");
									$bgcolor = "";
									if (mysqli_num_rows($query)) {
										while ($data_barang = $query->fetch_array()) {
											if ($no % 2 == 0) {
			                                    $bgcolor = "#F0F0F0";
			                                } else {
			                                    $bgcolor = "";
			                                }
		                                $kdBarang = $data_barang['kode_barang'];

		                                $sql_masuk = $con->query("select sum(stok) as 'stok' from transaksi_barang where kode_barang = '$kdBarang' and status = 1");
		                                $data_masuk = $sql_masuk->fetch_array();
		                                $jum_masuk = $data_masuk['stok'];
		                                $sql_keluar = $con->query("select sum(stok) as'stok' from transaksi_barang where kode_barang ='$kdBarang' and status = 0 ");
		                                $data_keluar = $sql_keluar->fetch_array();
		                                $jum_keluar = $data_keluar['stok'];
		                                $jumlah_barang = $jum_masuk - $jum_keluar;
								?>
								<?php if ($jumlah_barang >= 0 AND $jumlah_barang <= 1) : ?>
									<tr>
										<td class="text-center"><?php echo ++$no; ?>.</td>
										<td class="text-center"><?php echo $data_barang['kode_barang']; ?></td>
										<td><?php echo $data_barang['nama_barang']; ?></td>
										<td class="text-center"><?php echo $jumlah_barang; ?></td>
									</tr>
								<?php else : ?>
									
								<?php endif ?>
								<?php
										}
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card mb-3">
				<div class="card-header">
					<b><i>User Terakhir Login</i></b>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No.</th>
									<th>Username</th>
									<th>Last Login</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$no = 0;
									$query = $con->query("SELECT * FROM users ORDER BY last_login DESC LIMIT 5");
								?>
								<?php foreach ($query as $data_users) : ?>
									<tr>
										<td class="text-center"><?php echo ++$no ?>.</td>
										<td><?php echo $data_users['username']; ?></td>
										<td><?php echo $data_users['last_login']; ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?php echo json_encode($nama_produk); ?>,
			datasets: [{
				label: 'Grafik Penjualan',
				data: <?php echo json_encode($jumlah_produk); ?>,
				backgroundColor: 'rgba(255, 99, 132, 0.2)',
				borderColor: 'rgba(255,99,132,1)',
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
</script>