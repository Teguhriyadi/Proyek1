<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "dashboard";
    }
?>

<?php

    switch ($page) {

        // Dashboard

        case 'dashboard':
            include 'page/dashboard.php';
            break;

        // END

        // Kategori

        case 'kategori' :
            include 'page/kategori/data_kategori.php';
            break;

        case 'edit-kategori' :
            include 'page/kategori/edit_kategori.php';
            break;
        
        case 'aksi-edit-kategori' :
            include 'page/kategori/aksi/edit_kategori.php';
            break;
        // END

        // Supplier
        
        case 'supplier' :
            include 'page/supplier/data_supplier.php';
            break;

        case 'edit-supplier' :
            include 'page/supplier/edit_supplier.php';
            break;
        
        case 'aksi-edit-supplier' :
            include 'page/supplier/aksi/edit_supplier.php';
            break;
            
        // END

        // Barang
        
        case 'barang' :
            include 'page/barang/data_barang.php';
            break;

        case 'edit-barang' :
            include 'page/barang/edit_barang.php';
            break;
        
        case 'aksi-edit-barang' :
            include 'page/barang/aksi/edit_barang.php';
            break;
            
        // END

        // Users
        
        case 'users' :
            include 'page/users/data_users.php';
            break;

        case 'edit-users' :
            include 'page/users/edit_users.php';
            break;
        
        case 'aksi-edit-users' :
            include 'page/users/aksi/edit_users.php';
            break;
            
        // END

        // Transaksi
        case 'transaksi' :
            include 'page/transaksi/data_transaksi.php';
            break;

        case 'aksi-tambah-transaksi' :
            include 'page/transaksi/aksi/tambah_transaksi.php';
            break;

        case 'aksi-keluar-transaksi' :
            include 'page/transaksi/aksi/keluar_transaksi.php';
            break;

        case 'edit-transaksi' :
            include 'page/transaksi/edit_transaksi.php';
            break;

        case 'aksi-edit-transaksi' :
            include 'page/transaksi/aksi/edit_transaksi.php';
            break;
        // END

        // Pengiriman
        case 'pengiriman' :
            include 'page/pengiriman/data_pengiriman.php';
            break;

        case 'edit-pengiriman' :
            include 'page/pengiriman/edit_pengiriman.php';
            break;
        
        case 'aksi-edit-pengiriman' :
            include 'page/pengiriman/aksi/edit_pengiriman.php';
            break;

        // END

        case 'pembelian':
            include 'page/pembelian/data_pembelian.php';
            break;

        case 'detail_pembelian':
            include 'page/pembelian/detail_pembelian.php';
            break;

        // Informasi
        case 'informasi' :
            include 'page/informasi/data_informasi.php';
            break;

        case 'aksi-terima-informasi':
            include 'page/informasi/aksi/terima-informasi.php';
            break;

        case 'aksi-cancel-informasi':
            include 'page/informasi/aksi/cancel-informasi.php';
            break;
        // END

        // Cetak Barang
        case 'cetak-barang':
            include 'page/cetak/cetak-barang.php';
            break;
        // END

        // Saran & Masukan
        case 'saran':
            include 'page/saran/data_saran.php';
            break;
        // END

        // pembayaran
        case 'pembayaran':
            include 'page/pembelian/data_pembayaran.php';
            break;
        
        // Logout
        case 'logout' :
            include 'auth/logout.php';
            break;
            
        default:
            echo "<script>alert('Maaf, Halaman Tidak Ada');</script>";
            echo "<script>window.location.replace('?page=dashboard');</script>";
            break;
    }

?>

