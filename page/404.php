<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="60">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>.: IO - Keeper | <?php require 'mod/title.php'; ?> :.</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
    body {
      font-family: 'Open Sans';
      padding: 0;
      margin: 0;
    }
    a,
    a:visited {
      color: #fff;
      outline: none;
      text-decoration: none;
    }
    a:hover,
    a:focus,
    a:visited:hover {
      color: #fff;
      text-decoration: none;
    }
    * {
      paading: 0;
      margin: 0;
    }
    #oopss {
      background: #222;
      text-align: center;
      margin-bottom: 50px;
      font-weight: 400;
      font-size: 20px;
      position: fixed;
      width: 100%;
      height: 100%;
      line-height: 1.5em;
      z-index: 9999;
      left: 0px;
    }
    #error-text {
      top: 30%;
      position: relative;
      font-size: 40px;
      color: #eee;
    }
    #error-text a {
      color: #eee;
    }
    #error-text a:hover {
      color: #fff;
    }
    #error-text p {
      color: #eee;
      margin: 70px 0 0 0;
    }
    #error-text i {
      margin-left: 10px;
    }
    #error-text p.hmpg {
      margin: 40px 0 0 0;
    }
    #error-text span {
      position: relative;
      background: #ef4824;
      color: #fff;
      font-size: 300%;
      padding: 0 20px;
      border-radius: 5px;
      font-weight: bolder;
      transition: all .5s;
      cursor: pointer;
      margin: 0 0 40px 0;
    }
    #error-text span:hover {
      background: #d7401f;
      color: #fff;
      -webkit-animation: jelly .5s;
      -moz-animation: jelly .5s;
      -ms-animation: jelly .5s;
      -o-animation: jelly .5s;
      animation: jelly .5s;
    }
    #error-text span:after {
      top: 100%;
      left: 50%;
      border: solid transparent;
      content: '';
      height: 0;
      width: 0;
      position: absolute;
      pointer-events: none;
      border-color: rgba(136, 183, 213, 0);
      border-top-color: #ef4824;
      border-width: 7px;
      margin-left: -7px;
    }
    @-webkit-keyframes jelly {
      from, to {
        -webkit-transform: scale(1, 1);
        transform: scale(1, 1);
      }
      25% {
        -webkit-transform: scale(.9, 1.1);
        transform: scale(.9, 1.1);
      }
      50% {
        -webkit-transform: scale(1.1, .9);
        transform: scale(1.1, .9);
      }
      75% {
        -webkit-transform: scale(.95, 1.05);
        transform: scale(.95, 1.05);
      }
    }
    @keyframes jelly {
      from, to {
        -webkit-transform: scale(1, 1);
        transform: scale(1, 1);
      }
      25% {
        -webkit-transform: scale(.9, 1.1);
        transform: scale(.9, 1.1);
      }
      50% {
        -webkit-transform: scale(1.1, .9);
        transform: scale(1.1, .9);
      }
      75% {
        -webkit-transform: scale(.95, 1.05);
        transform: scale(.95, 1.05);
      }
    }
    /* CSS Error Page Responsive */
    @media only screen and (max-width:640px) {
      #error-text span {
        font-size: 200%;
      }
      #error-text a:hover {
        color: #fff;
      }
    }
    .back:active {
      -webkit-transform: scale(0.95);
      -moz-transform: scale(0.95);
      transform: scale(0.95);
      background: #f53b3b;
      color: #fff;
    }
    .back:hover {
      background: #4c4c4c;
      color: #fff;
    }
    .back {
      text-decoration: none;
      background: #5b5a5a;
      color: #fff;
      padding: 10px 20px;
      font-size: 20px;
      font-weight: 700;
      line-height: normal;
      text-transform: uppercase;
      border-radius: 3px;
      -webkit-transform: scale(1);
      -moz-transform: scale(1);
      transform: scale(1);
      transition: all 0.5s ease-out;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href="?page=dashboard"><i class="fa fa-apple"></i> IO - Keeper</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="?page=dashboard"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
          </li>
          <?php if (isset($_SESSION['pelanggan'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="?page=riwayat"><i class="fa fa-search"></i> Riwayat Belanja </a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="?page=login"><i class="fa fa-search"></i> Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=daftar"><i class="fa fa-pencil"></i> Daftar</a>
            </li>
          <?php endif ?>
          <li class="nav-item">
            <a class="nav-link" href="?page=keranjang"><i class="fa fa-shopping-cart"></i> Keranjang </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=checkout"><i class="fa fa-shopping-cart"></i> Checkout</a>
          </li>
        </ul>
        <?php if (@$_SESSION['pelanggan'] == "") : ?>
          <a href="?page=login" class="btn btn-success btn-sm">
            <i class="fa fa-sign-in"></i> Masuk / Login
          </a>
        </form>
      <?php else : ?>
        <a href="?page=logout" class="btn btn-danger btn-sm">
          <i class="fa fa-sign-out"></i> Logout
        </a>
      <?php endif ?>
    </div>
  </div>
</nav>

<div id='oopss'>
  <div id='error-text'>
    <!-- BAGIAN TEXT -->
    <span>404</span>
    <p>PAGE NOT FOUND</p>
    <p class='hmpg'><a href='?page=dashboard' class="back">Back To Home</a></p>
  </div>
</div>

<footer class="warna-bg">
  <div class="text-white text-center pt-3 pb-3">
    &copy; Copyright 2021. All Rights Reserved. Design By <b>Kelompok 2</b>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>