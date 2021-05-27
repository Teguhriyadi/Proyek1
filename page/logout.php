<?php
	session_destroy();
	echo "<script>alert('Anda Telah Logout');</script>";
	echo "<script>location='?page=dashboard';</script>";
?>