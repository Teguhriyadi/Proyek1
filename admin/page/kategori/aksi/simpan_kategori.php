<?php
	
	if (!isset($_POST['btn-simpan'])) {
		echo "<script>alert('Maaf, Anda Tidak Boleh Akses Sembarangan');</script>";
	    echo "<script>location='?page=kategori';</script>";
	    exit;
	}

    $nama_kategori = $_POST['nama_kategori'];

    $result = $con->query("SELECT nama_kategori FROM kategori WHERE nama_kategori = '$nama_kategori'");

    if (mysqli_fetch_assoc($result) > 0) {
    	echo "<script>alert('Tidak Boleh Ada Duplikasi Data');</script>";
	    echo "<script>location='?page=kategori';</script>";
	    exit;
    }

    $query = $con->query("INSERT INTO kategori VALUES ('','$nama_kategori')");
    
	 if ($query != 0) {
	        echo "<script>alert('Data Berhasil di Tambahkan');</script>";
	        echo "<script>location='?page=kategori';</script>";
	    } else {
	        echo "<script>alert('Data Gagal di Tambahkan');</script>";
	        echo "<script>location='?page=tambah-kategori';</script>";
	   }

?>