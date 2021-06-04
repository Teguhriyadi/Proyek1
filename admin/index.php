<?php 
  define('access', true);
  session_start();
    // Memanggil Koneksi
  include '../config/koneksi.php'; 

    // cek apakah yang mengakses halaman ini sudah login
  if(!isset($_SESSION['login-admin'])){
    echo "<script>alert('Harus Login Terlebih Dahulu');</script>";
    echo "<script>location='auth/login.php';</script>";
  } else if ($_SESSION['level']!="admin") {
    echo "<script>location='../index.php';</script>";
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>.: IO - Keeper | <?php require 'mod/title.php'; ?> :. </title>
  <!-- Bootstrap core CSS-->
  <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="template/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="template/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="template/css/sb-admin.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
  <script src="js/Chart.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="?page=dashboard"><i class="fa fa-edit"></i> IO - Keeper</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="?page=dashboard">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kategori">
          <a class="nav-link" href="?page=kategori">
            <i class="fa fa-fw fa-bars"></i>
            <span class="nav-link-text">Kategori</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Supplier">
          <a class="nav-link" href="?page=supplier">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Supplier</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Barang">
          <a class="nav-link" href="?page=barang">
            <i class="fa fa-fw fa-folder-open"></i>
            <span class="nav-link-text">Barang</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Supplier">
          <a class="nav-link" href="?page=pengiriman">
            <i class="fa fa-fw fa-bus"></i>
            <span class="nav-link-text">Pengiriman</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Supplier">
          <a class="nav-link" href="?page=transaksi">
            <i class="fa fa-fw fa-pencil"></i>
            <span class="nav-link-text">Transaksi</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Supplier">
          <a class="nav-link" href="?page=pembelian">
            <i class="fa fa-fw fa-money"></i>
            <span class="nav-link-text">Pembelian</span>
          </a>
        </li>
          
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
          <a class="nav-link" href="?page=users">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group mt-2 text-white" style="text-transform: uppercase;">
              Sedang Aktif : <?php echo $_SESSION['username']; ?>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModalLogout"><i class="fa fa-sign-out"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Logout -->
    <div class="modal fade" id="exampleModalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sign-out"></i> Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form" method="POST" action="?page=logout">
            <div class="modal-body">
              <div class="form-group">
                <p>Apakah anda yakin untuk logout ?</p>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
              <button type="submit" name="btn-logout-admin" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-up"></i> ya </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END -->

  <div class="content-wrapper">
    <?php require 'mod/halaman.php'; ?>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>&copy; Copyright 2021. All Right Reserved. Design By <b>Kelompok 2</b></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
  </div>
  <script src="template/vendor/jquery/jquery.min.js"></script>
  <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Page level plugin JavaScript-->
  <script src="template/vendor/chart.js/Chart.min.js"></script>
  <script src="template/vendor/datatables/jquery.dataTables.js"></script>
  <script src="template/vendor/datatables/dataTables.bootstrap4.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="template/js/sb-admin.min.js"></script>
  <!-- Custom scripts for this page-->
  <script src="template/js/sb-admin-datatables.min.js"></script>
  <script src="template/js/sb-admin-charts.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

</body>

</html>
