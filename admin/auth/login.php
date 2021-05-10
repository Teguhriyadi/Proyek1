<?php 
    session_start();

    if(isset($_SESSION['level'])){
        echo "<script>alert('Maaf, Harus Logout Terlebih Dahulu');</script>";
        echo "<script>location='../?page=dashboard';</script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <title>Login</title>
        <link rel="stylesheet" href="style.css" media="screen" title="no title">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    </head>
    <body>

    <form method="POST" action="do_login.php">
        <div class="login">
            <div class="avatar">
                <i class="fa fa-user"></i>
            </div>

            <h2>Login Form</h2>

            <div class="box-login">
                <i class="fas fa-envelope-open-text"></i>
                <input type="text" placeholder="Username" name="username" autocomplete="off">
            </div>

            <div class="box-login">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password"  autocomplete="off">
            </div>

            <button type="submit" name="login" class="btn-login">Login</button>
        </div>
    </form>

    </body>
</html>