<?php
    include '../../../config/koneksi.php';
    
    if (isset($_POST['kode_barang'])) {
        $kode_barang = $_POST['kode_barang'];

        $query = $con->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang'");

        $edit = $query->fetch_assoc();
    } else {
        echo "<script>alert('Maaf, Anda Tidak Bisa Sembarang Akses Halaman Ini!');</script>";
        echo "<script>location='../../?page=barang';</script>";
        exit;
    }
    
?>
<input type="hidden" name="foto_lama" value="<?php echo $edit['foto']; ?>">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="kode_barang"> Kode Barang </label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Barang" autocomplete="off" value="<?php echo $edit['kode_barang']; ?>" readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="id_kategori"> Kategori </label>
            <select id="id_kategori" name="id_kategori" class="form-control">
                <option value="">- Pilih -</option>
                <?php
                $queryKategori = $con->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
                ?>
                <?php foreach ($queryKategori as $kategori_data) : ?>
                    <?php if ($edit['id_kategori'] == $kategori_data['id_kategori']) : ?>
                    <option value="<?php echo $kategori_data['id_kategori']; ?>" selected>
                        <?php echo $kategori_data['nama_kategori']; ?>
                    </option>
                    <?php else : ?>
                    <option value="<?php echo $kategori_data['id_kategori']; ?>">
                        <?php echo $kategori_data['nama_kategori']; ?>
                    </option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="nama_barang"> Nama Barang </label>
    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" autocomplete="off" value="<?php echo $edit['nama_barang']; ?>">
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="harga"> Harga </label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="0" autocomplete="off" value="<?php echo $edit['harga']; ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="satuan"> Satuan </label>  
            <select id="satuan" name="satuan" class="form-control">
                <option value="">- Pilih -</option>
                <?php if ($edit['satuan'] == "pcs") : ?>
                    <option value="pcs" selected>PCS</option>
                    <option value="kg">KG</option>
                    <option value="ml">ML</option>
                    <option value="setengah">1/2</option>
                    <option value="tiga_per_empat">3/4</option>
                <?php elseif ($edit['satuan'] == "kg") : ?>
                    <option value="pcs">PCS</option>
                    <option value="kg" selected>KG</option>
                    <option value="ml">ML</option>
                    <option value="setengah">1/2</option>
                    <option value="tiga_per_empat">3/4</option>
                <?php elseif ($edit['satuan'] == "ml") : ?>
                    <option value="pcs">PCS</option>
                    <option value="kg">KG</option>
                    <option value="ml" selected>ML</option>
                    <option value="setengah">1/2</option>
                    <option value="tiga_per_empat">3/4</option>
                <?php elseif ($edit['satuan'] == "setengah") : ?>
                    <option value="pcs">PCS</option>
                    <option value="kg">KG</option>
                    <option value="ml">ML</option>
                    <option value="setengah" selected>1/2</option>
                    <option value="tiga_per_empat">3/4</option>
                <?php elseif ($edit['satuan'] == "tiga_per_empat") : ?>
                    <option value="pcs">PCS</option>
                    <option value="kg">KG</option>
                    <option value="ml">ML</option>
                    <option value="setengah">1/2</option>
                    <option value="tiga_per_empat" selected>3/4</option>
                <?php else : ?>
                    <option value="pcs">PCS</option>
                    <option value="kg">KG</option>
                    <option value="ml">ML</option>
                    <option value="setengah">1/2</option>
                    <option value="tiga_per_empat">3/4</option>
                <?php endif ?>
            </select>
        </div>
    </div>
</div>

<?php if ($edit['foto'] == "") : ?>

<?php else : ?>
<div class="form-group">
    <label for="gambar_album"> Gambar Gallery </label> <br>
    <img src="page/img/<?php echo $edit['foto']; ?>" width="300">
</div>
<?php endif ?>

<div class="form-group">
    <label for="ganti_gambar"> Ganti Gambar</label>
    <input type="file" class="form-control" id="ganti_gambar" name="foto">
</div>
<div class="form-group">
    <label for="keterangan"> Keterangan </label>
    <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Masukkan Keterangan"><?php echo $edit['keterangan']; ?></textarea>
</div>