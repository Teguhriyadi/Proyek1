<?php
  session_start();
  include 'config/koneksi.php';
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>.: IO - Keeper | <?php require 'mod/title.php'; ?> :.</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">IO - Keeper</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="?page=home"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=about"><i class="fa fa-search"></i> About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=contact"><i class="fa fa-phone"></i> Contact</a>
          </li>
          <?php if (isset($_SESSION['login'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="?page=informasi">Informasi</a>
            </li>
          <?php else : ?>
            
          <?php endif ?>
        </ul>

        <?php if (!isset($_SESSION['login'])) : ?>
        <form class="form-inline my-2 my-lg-0">
          <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-in"></i> Masuk / Login
        </button>
        </form>
        <?php else : ?>
        <form class="form-inline my-2 my-lg-0">
          <a class="btn btn-success my-2 my-sm-0" href="logout.php"><i class="fa fa-plus"></i> Logout </a>
        </form>
        <?php endif ?>
      </div>
    </div>
  </nav>

  <?php require 'mod/halaman.php'; ?>


  <footer class="warna-bg">
    <div class="text-white text-center pt-3 pb-3">
      &copy; Copyright 2021. All Rights Reserved. Design By <b>Kelompok 2</b>
    </div>
  </footer>

  <!-- Tombol Modal Masuk / Login -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sign-out"></i> Masuk / Login </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form" method="POST" action="?page=aksi-auth-login">
          <div class="modal-body">
            <div class="form-group">
              <label for="username"> Username </label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="password"> Password </label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" name="btn-login"><i class="fa fa-refresh"></i> Batal</button>
            <button type="submit" name="btn-login" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- END -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>