<?php

if(!defined('INDEX')) die("");

global $con;

?>

<h2 class="Judul">Tambah Pegawai</h2>
<form action="?hal=pegawai_insert" method="post" enctype="multipart/form-data">

    <div class="form-card">

        <div class="form-group">
            <label for="foto">Foto</label>
            <div class="input">
                <input type="file" name="foto" id="foto">
            </div>
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <div class="input">
                <input type="text" name="nama" id="nama" required>
            </div>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="input radio-group">
                <label>
                    <input type="radio" id="jk-l" name="jk" value="L" required>
                    Laki-laki
                </label>

                <label>
                    <input type="radio" id="jk-p" name="jk" value="P">
                    Perempuan
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal Lahir</label>
            <div class="input">
                <input type="date" name="tanggal" id="tanggal">
            </div>
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <div class="input">
                <select name="jabatan" id="jabatan" required>
                    <option value="">Pilih Jabatan</option>

                    <?php
                    $queryjabatan = mysqli_query($con, "SELECT * FROM jabatan");

                    while ($j = mysqli_fetch_assoc($queryjabatan)) {
                    ?>
                        <option value="<?= $j['id']; ?>">
                            <?= htmlspecialchars($j['nama_jabatan']); ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group tombol-group">
            <div class="input">
                <input type="submit" value="Simpan" class="tombol simpan">
                <input type="reset" value="Batal" class="tombol riset">
            </div>
        </div>

    </div>

</form>
