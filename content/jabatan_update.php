<?php
if (!defined('INDEX')) {
    die("");
}

global $con;

// Cek ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID jabatan tidak valid";
    exit;
}

$id = (int) $_GET['id'];

// Cek nama
if (!isset($_POST['nama']) || empty(trim($_POST['nama']))) {
    echo "Nama jabatan tidak boleh kosong";
    exit;
}

$nama = mysqli_real_escape_string($con, $_POST['nama']);

// Update data
$query = mysqli_query(
    $con,
    "UPDATE jabatan SET nama_jabatan = '$nama' WHERE id = $id"
);

if ($query) {
    echo "<script>
        alert('Data berhasil diubah');
        window.location='?hal=jabatan';
    </script>";
    exit;
} else {
    echo "Data gagal diubah: " . mysqli_error($con);
}
?>