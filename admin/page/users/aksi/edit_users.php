<?php
    
    if (!isset($_POST['btn-edit'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Akses Sembarangan');</script>";
        echo "<script>location='?page=users';</script>";
        exit;
    }

    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_baru = mysqli_real_escape_string($con, $_POST['password_baru']);
    $konfirmasi_password = mysqli_real_escape_string($con, $_POST['konfirmasi_password']);
    date_default_timezone_set('Asia/Jakarta');
    $updated_at = date("Y-m-d H:i:s");
    $level = $_POST['level'];

    if ($password_baru != $konfirmasi_password) {
        echo "<script>alert('Konfirmasi Password Baru Salah');</script>";
        echo "<script>location='?page=users';</script>";
        exit;
    }

    // enkripsi password
    $password_baru = password_hash($password_baru, PASSWORD_DEFAULT);

    $query = $con->query("UPDATE users SET username = '$username', email = '$email', password = '$password_baru', updated_at = '$updated_at', level = '$level' WHERE id = $id ");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Ubah');</script>";
        echo "<script>location='?page=users';</script>";
        exit;
    } else {
        echo "<script>alert('Data Gagal di Ubah');</script>";
        echo "<script>location='?page=users';</script>";
        exit;
    }

?>