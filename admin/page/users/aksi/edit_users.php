<?php
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $updated_at = date("Y-m-d H:i:s");
    $last_login = date("Y-m-d H:i:s");
    $level = $_POST['level'];

    $query = $con->query("UPDATE users SET username = '$username', email = '$email' , password = '$password', updated_at = '$updated_at', last_login = '$last_login', level = '$level' WHERE id = $id ");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Ubah');</script>";
        echo "<script>location='?page=users';</script>";
    } else {
        echo "<script>alert('Data Gagal di Ubah');</script>";
        echo "<script>location='?page=edit-users&id=$id'</script>";
    }

?>