<?php
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = "dashboard";
	}
		
    switch ($page) {
        case 'dashboard':
            echo "Dashboard";
            break;

        case 'kategori' :
            echo "Kategori";
            break;

        case 'tambah-kategori' :
            echo "Tambah Kategori";
            break;

        case 'edit-kategori' :
            echo "Edit Kategori";
            break;

        case 'supplier':
            echo "Supplier";
            break;

        case 'tambah-supplier' :
            echo "Tambah Supplier";
            break;

        case 'edit-supplier' :
            echo "Edit Supplier";
            break;

        case 'barang' :
            echo "Barang";
            break;

        case 'tambah-barang' :
            echo "Tambah Barang";
            break;
        
        case 'edit-barang' :
            echo "Edit Barang";
            break;

        case 'users' :
            echo "Users";
            break;

        case 'tambah-users' :
            echo "Tambah Users";
            break;

        case 'edit-users' :
            echo "Edit Users";
            break;

        case 'transaksi' :
            echo "Data Transaksi";
            break;

        case 'pembelian':
            echo "Data Pembelian";
            break;

        case 'detail_pembelian':
            echo "Detail Pembelian";
            break;

        case 'informasi':
            echo "Data Informasi";
            break;
        
        default:
            # code...
            break;
    }
?>