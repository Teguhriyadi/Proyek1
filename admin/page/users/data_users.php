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
                                    <?php else : ?>
                                        Tidak Ada
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <a href="" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                    <a onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" href="?page=hapus-users&id=<?php echo $data_users['id']; ?>" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
            <form method="POST" action="?page=aksi-simpan-users">
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
                        <label for="level"> Level </label>
                        <select class="form-control" id="level" name="level">
                            <option value="">- Pilih -</option>
                            <option value="admin">Admin</option>
                            <option value="gudang">Gudang</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->