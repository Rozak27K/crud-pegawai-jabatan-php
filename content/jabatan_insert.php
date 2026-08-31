<?php
global $con;
if (!defined('INDEX')) die("");

if (empty($_POST['nama'])) {
    echo "Nama jabatan tidak boleh kosong";
    header("refresh:1;url=?hal=jabatan_tambah");
    exit;
}

$query = mysqli_query($con, "INSERT INTO jabatan SET nama_jabatan ='$_POST[nama]'");

if ($query) {
    echo "Data berhasil disimpan";
    header("refresh:1;url=?hal=jabatan");
    exit;
} else {
    echo "Tidak dapat menyimpan data";
    echo mysqli_error($con);
    header("refresh:1;url=?hal=jabatan");
}
