<script type="text/javascript">
    function editUsers(id) {
        $.ajax({
            url : "http://localhost/Proyek1/admin/page/users/edit-users.php",
            type : "POST",
            data : { id : id },
            success : function (data) {
                $("#modal-update").html(data);
                return true;
            }
        })
    }

    function berhasil() {
        setTimeout(function() {
            swal({
                title : 'BERHASIL',
                text : 'Data Berhasil di Tambahkan',
                type : 'success',
                showConfirmationButton : true
            });
        });
        window.setTimeout(function() {
            window.location.replace("?page=users");
        }, 3000);
    }

    function gagal() {
        setTimeout(function() {
            swal({
                title : 'GAGAL',
                text : 'Data Gagal di Tambahkan',
                type : 'error',
                showConfirmationButton : true
            });
        });
        window.setTimeout(function() {
            window.location.replace("?page=users");
        }, 3000);
    }

    function berhasil_hapus() {
        setTimeout(function() {
            swal({
                title : 'BERHASIL',
                text : 'Data Berhasil di Hapus',
                type : 'success',
                showConfirmationButton : true
            });
        });
        window.setTimeout(function() {
            window.location.replace("?page=users");
        }, 3000);
    }

    function gagal_hapus() {
        setTimeout(function() {
            swal({
                title : 'GAGAL',
                text : 'Data Gagal di Hapus',
                type : 'error',
                showConfirmationButton : true
            });
        });
        window.setTimeout(function() {
            window.location.replace("?page=users");
        }, 3000);
    }
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-user"></i> Data Users</h3>
            <br>
        </div>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Users</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th class="text-center">Terakhir Login</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = $con->query("SELECT * FROM users ORDER BY username ASC");
                        $bgcolor = "";
                        
                        ?>
                        <?php foreach ($query as $data_users) : ?>
                            <?php 
                                if ($no % 2 == 0) {
                                    $bgcolor = "#F0F0F0";
                                } else {
                                    $bgcolor = "";
                                }
                            ?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td class="text-center"><?php echo ++$no; ?>.</td>
                                <td><?php echo $data_users['username']; ?></td>
                                <td><?php echo $data_users['email']; ?></td>
                                <td class="text-center"><?php echo $data_users['last_login']; ?></td>
                                <td class="text-center">
                                    <?php if ($data_users['level'] == 'admin') : ?>
                                        Admin
                                    <?php elseif ($data_users['level'] == 'gudang') : ?>
                                        Gudang
                                    <?php elseif ($data_users['level'] == 'kasir') : ?>
                                        Kasir
                                    <?php elseif ($data_users['level'] == 'informan') : ?>
                                        Informan
                                    <?php else : ?>
                                        Tidak Ada
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <button onclick="editUsers(<?php echo $data_users['id']; ?>)" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalUpdate">
                                        <i class="fa fa-pencil"></i> Edit
                                    </button>
                                    
                                    <?php if ($_SESSION['username'] == $data_users['username'] ) : ?>
                                        
                                    <?php else : ?>
                                        <form class="d-inline" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $data_users['id']; ?>">
                                            <button onclick="return confirm ('Yakin ? Anda Ingin Menghapus Data Ini ?')" type="submit" name="btn-hapus" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-o"></i> Hapus
                                            </button>
                                        </form>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Tambah Data Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username"> Username </label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password"> Password </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password"> Konfirmasi Password </label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Masukkan Konfirmasi Password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="level"> Level </label>
                        <select class="form-control" id="level" name="level">
                            <option value="">- Pilih -</option>
                            <option value="admin">Admin</option>
                            <option value="gudang">Gudang</option>
                            <option value="kasir">Kasir</option>
                            <option value="informan">Informan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                    <button type="submit" name="btn-simpan" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Edit Data -->
<div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Data Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="?page=aksi-edit-users">
                <div class="modal-body" id="modal-update">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                    <button type="submit" name="btn-edit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Fungsi Tambah Data -->
<?php
    if (isset($_POST['btn-simpan'])) {
        date_default_timezone_set('Asia/Jakarta');
        $username = strtolower(stripslashes($_POST['username']));
        $email = $_POST['email'];
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        $last_login = NULL;
        $level = $_POST['level'];

        // cek username sudah ada atau belum
        $result = $con->query("SELECT username FROM users WHERE username = '$username'");

        if (mysqli_fetch_assoc($result) > 0) {
            echo "<script>alert('Username sudah terdaftar');</script>";
            echo "<script>location='?page=users';</script>";
        }

        if ($password !== $confirm_password) {
            echo "<script>alert('Konfirmasi Password Tidak Sesuai');</script>";
            echo "<script>location='?page=users';</script>";
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan userbaru ke database
        $query = $con->query("INSERT INTO users VALUES ('','$username', '$email', '$password', '$created_at', '$updated_at','$last_login','$level') ");

        if ($query != 0) {
            echo "<script>berhasil();</script>";
        } else {
            echo "<script>gagal();</script>";
        }
    }
?>
<!-- END -->

<!-- Fungsi Hapus Data -->
<?php
    if (isset($_POST['btn-hapus'])) {
        $id = $_POST['id'];

        $query = $con->query("DELETE FROM users WHERE id = $id");

        if ($query != 0) {
            echo "<script>berhasil_hapus();</script>";
        } else {
            echo "<script>gagal_hapus();</script>";
        }
    }
?>
<!-- END -->