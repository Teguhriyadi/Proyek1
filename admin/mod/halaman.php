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

        case 'tambah-kategori' :
            include 'page/kategori/tambah_kategori.php';
            break;
        
        case 'aksi-simpan-kategori' :
            include 'page/kategori/aksi/simpan_kategori.php';
            break;

        case 'edit-kategori' :
            include 'page/kategori/edit_kategori.php';
            break;
        
        case 'aksi-edit-kategori' :
            include 'page/kategori/aksi/edit_kategori.php';
            break;
        
        case 'hapus-kategori' :
            include 'page/kategori/aksi/hapus_kategori.php';
            break;
        // END

        // Supplier
        
        case 'supplier' :
            include 'page/supplier/data_supplier.php';
            break;

        case 'tambah-supplier' :
            include 'page/supplier/tambah_supplier.php';
            break;
        
        case 'aksi-simpan-supplier' :
            include 'page/supplier/aksi/simpan_supplier.php';
            break;

        case 'edit-supplier' :
            include 'page/supplier/edit_supplier.php';
            break;
        
        case 'aksi-edit-supplier' :
            include 'page/supplier/aksi/edit_supplier.php';
            break;
        
        case 'hapus-supplier' :
            include 'page/supplier/aksi/hapus_supplier.php';
            break;
            
        // END

        // Barang
        
        case 'barang' :
            include 'page/barang/data_barang.php';
            break;

        case 'tambah-barang' :
            include 'page/barang/tambah_barang.php';
            break;
        
        case 'aksi-simpan-barang' :
            include 'page/barang/aksi/simpan_barang.php';
            break;

        case 'edit-barang' :
            include 'page/barang/edit_barang.php';
            break;
        
        case 'aksi-edit-barang' :
            include 'page/barang/aksi/edit_barang.php';
            break;
        
        case 'hapus-barang' :
            include 'page/barang/aksi/hapus_barang.php';
            break;
            
        // END

        // Users
        
        case 'users' :
            include 'page/users/data_users.php';
            break;

        case 'tambah-users' :
            include 'page/users/tambah_users.php';
            break;
        
        case 'aksi-simpan-users' :
            include 'page/users/aksi/simpan_users.php';
            break;

        case 'edit-users' :
            include 'page/users/edit_users.php';
            break;
        
        case 'aksi-edit-users' :
            include 'page/users/aksi/edit_users.php';
            break;
        
        case 'hapus-users' :
            include 'page/users/aksi/hapus_users.php';
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

        case 'hapus-transaksi' :
            include 'page/transaksi/hapus_transaksi.php';
            break;
        // END

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
        
        // Logout
        case 'logout' :
            include 'auth/logout.php';
            break;
            
        default:
            echo "404 Not Found";
            break;
    }

?>

