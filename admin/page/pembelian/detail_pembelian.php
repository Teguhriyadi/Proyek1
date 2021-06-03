<?php

if (!defined('access')) {
    echo "<script>alert('Maaf, Anda Tidak Berhak Masuk Ke Halaman Ini');</script>";
    echo "<script>window.location.replace('../../?page=dashboard');</script>";
    exit;
}

?>

<?php
$id_pembelian = $_GET['id_pembelian'];

$query = $con->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");

foreach ($query as $edit) {
        # code...
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-search"></i> Detail Pembelian</h3>
            <br>
        </div>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Detail Pembelian</li>
    </ol>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Data Pelanggan
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_pelanggan"> Nama Pelanggan </label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $edit['nama_pelanggan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email_pelanggan"> Email Pelanggan </label>
                        <input type="text" class="form-control" id="email_pelanggan" name="email_pelanggan" value="<?php echo $edit['email_pelanggan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="telepon_pelanggan"> Telepon Pelanggan </label>
                        <input type="text" class="form-control" id="telepon_pelanggan" name="telepon_pelanggan" value="<?php echo $edit['telepon_pelanggan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat_pelanggan"> Alamat Pelanggan </label>
                        <textarea id="alamat_pelanggan" class="form-control" rows="4"><?php echo $edit['alamat_pelanggan'] ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    Data Pembelian
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_pembelian"> Tanggal Pembelian </label>
                                <input type="text" class="form-control" id="tanggal_pembelian" value="<?php echo $edit['tanggal_pembelian'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total_pembelian"> Total Pembelian </label>
                                <input type="text" class="form-control" id="total_pembelian" value="<?php echo $edit['total_pembelian'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_kota"> Nama Kota </label>
                                <input type="text" class="form-control" id="nama_kota" value="<?php echo $edit['nama_kota']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tarif"> Tarif </label>
                                <input type="text" class="form-control" id="tarif" value="<?php echo $edit['tarif']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status_pembelian"> Status Pembelian </label>
                                <input type="text" class="form-control" id="status_pembelian" value="<?php echo $edit['status_pembelian'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="?page=pembelian" class="btn btn-primary btn-block">
                <i class="fa fa-refresh"></i> Kembali
            </a>
        </div>
    </div>
</div>
<br>