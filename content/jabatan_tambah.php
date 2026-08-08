<?php

if(!defined('INDEX')) die("");

?>

<h2 class="Judul">Tambah Jabatan</h2>
<form method="post" action="?hal=jabatan_insert" >

    <div class="form-card">

        <div class="form-group">
            <label for="nama">nama</label>
            <div class="input">
                <input type="text" name="nama" id="nama">
            </div>
        </div>

        <div class="form-group tombol-group">
            <div class="input">
                    <input type="submit" value="simpan" class="tombol simpan">
                    <input type="reset" value="batal" class="tombol riset">
            </div>
        </div>

    </div>

</form>