<?php
global $con;
if (!defined('INDEX')) die("");

if (empty($_POST['nama'])) {
    echo "Nama jabatan tidak boleh kosong";
    header("refresh:1;url=?hal=jabatan_tambah");
    exit;
}

$nama = mysqli_real_escape_string($con, $_POST['nama']);
$idResult = mysqli_query($con, "SELECT COALESCE(MAX(id), 0) + 1 AS next_id FROM jabatan");
$idData = mysqli_fetch_assoc($idResult);
$id = (int) $idData['next_id'];

$query = mysqli_query($con, "INSERT INTO jabatan SET id = '$id', nama_jabatan = '$nama'");

if ($query) {
    echo "Data berhasil disimpan";
    header("refresh:1;url=?hal=jabatan");
    exit;
} else {
    echo "Tidak dapat menyimpan data";
    echo mysqli_error($con);
    header("refresh:1;url=?hal=jabatan");
}
