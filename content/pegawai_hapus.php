<?php
if (!defined('INDEX')) {
    die("");
}

global $con;

// Cek ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>
        alert('ID pegawai tidak valid');
        window.location='?hal=pegawai';
    </script>";
    exit;
}

$id = (int)$_GET['id'];

// Ambil data pegawai
$query = mysqli_query($con, "SELECT * FROM pegawai WHERE id = '$id'");

if (!$query || mysqli_num_rows($query) == 0) {
    echo "<script>
        alert('Data pegawai tidak ditemukan');
        window.location='?hal=pegawai';
    </script>";
    exit;
}

$data = mysqli_fetch_assoc($query);

// Hapus foto jika ada
if (!empty($data['foto'])) {

    $path = "images/" . $data['foto'];

    if (file_exists($path)) {
        unlink($path);
    }
}

// Hapus data dari database
$hapus = mysqli_query($con, "DELETE FROM pegawai WHERE id = '$id'");

if ($hapus) {

    echo "<script>
        alert('Data pegawai berhasil dihapus');
        window.location='?hal=pegawai';
    </script>";

} else {

    echo "<script>
        alert('Data gagal dihapus');
        window.location='?hal=pegawai';
    </script>";

}
?>