<?php
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = "dashboard";
	}

	switch ($page) {
		case 'dashboard':
			# code...
			break;

		case 'kategori':
			'<script src="../page/kategori/js/ajaxKategori.js"></script>';
			break;
		
		default:
			# code...
			break;
	}
?>