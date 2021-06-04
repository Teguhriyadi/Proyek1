<?php
	unset($_SESSION['pelanggan']);
	echo "<script>alert('Anda Telah Logout');</script>";
	echo "<script>location='?page=dashboard';</script>";
?>