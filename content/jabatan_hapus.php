<?php
if (!defined('INDEX')) {
    die("");
}

global $con;

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>
        alert('ID jabatan tidak valid');
        window.location='?hal=jabatan';
    </script>";
    exit;
}

$id = (int) $_GET['id'];

$stmt = mysqli_prepare(
    $con,
    "DELETE FROM jabatan WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);

$query = mysqli_stmt_execute($stmt);

if ($query) {
    echo "<script>
        alert('Data berhasil dihapus');
        window.location='?hal=jabatan';
    </script>";
    exit;
} else {
    echo "Data gagal dihapus: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
?>