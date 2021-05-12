<?php

	include '../../../config/koneksi.php';

	if (isset($_POST['id'])) {
		$id = $_POST['id'];

		$query = $con->query("SELECT * FROM users WHERE id = $id");

		$edit = $query->fetch_assoc();
	} else {
		echo "<script>alert('Maaf, Anda Tidak Bisa Sembarang Akses Halaman Ini!');</script>";
		echo "<script>location='../../?page=users';</script>";
		exit;
	}

?>

<input type="hidden" name="id" value="<?php echo $edit['id']; ?>">

<div class="form-group">
	<label for="username"> Username </label>
	<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" autocomplete="off" value="<?php echo $edit['username']; ?>">
</div>
<div class="form-group">
	<label for="email"> Email </label>
	<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" autocomplete="off" value="<?php echo $edit['email']; ?>">
</div>
<div class="form-group">
	<label for="password_baru"> Ganti Password Baru </label>
	<input type="password" class="form-control" id="password" name="password_baru" placeholder="Masukkan Password" autocomplete="off">
</div>
<div class="form-group">
	<label for="konfirmasi_password"> Konfirmasi Password </label>
	<input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Masukkan Konfirmasi Password">
</div>
<div class="form-group">
	<label for="level"> Level </label>
	<select class="form-control" id="level" name="level">
		<option value="">- Pilih -</option>
		<?php if ($edit['level'] == "admin") : ?>
			<option value="admin" selected>Admin</option>
			<option value="gudang">Gudang</option>
			<option value="kasir">Kasir</option>
		<?php elseif ($edit['level'] == "gudang") :  ?>
			<option value="admin">Admin</option>
			<option value="gudang" selected>Gudang</option>
			<option value="kasir">Kasir</option>
		<?php elseif ($edit['level'] == "kasir") : ?>
			<option value="admin">Admin</option>
			<option value="gudang">Gudang</option>
			<option value="kasir" selected>Kasir</option>
		<?php else : ?>
			<option value="admin">Admin</option>
			<option value="gudang">Gudang</option>
			<option value="kasir">Kasir</option>
		<?php endif ?>
	</select>
</div>
