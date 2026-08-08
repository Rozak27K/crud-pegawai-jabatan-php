<?php
if (!defined('INDEX')) {
    die("");
}

global $con;

// Cek ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID pegawai tidak valid";
    exit;
}

$id = (int)$_GET['id'];

// Validasi input
if (empty($_POST['nama'])) {
    echo "Nama pegawai tidak boleh kosong";
    exit;
}

$nama     = mysqli_real_escape_string($con, $_POST['nama']);
$jk       = mysqli_real_escape_string($con, $_POST['jk']);
$tanggal  = mysqli_real_escape_string($con, $_POST['tanggal']);
$jabatan  = (int)$_POST['jabatan'];

$foto = $_POST['foto_lama'];

// Jika user memilih foto baru
if (isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {

    $namaFile = $_FILES['foto']['name'];
    $tmp      = $_FILES['foto']['tmp_name'];
    $ukuran   = $_FILES['foto']['size'];

    $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
        echo "Format foto harus JPG, JPEG, atau PNG";
        exit;
    }

    if ($ukuran > 1024 * 1024) {
        echo "Ukuran foto maksimal 1 MB";
        exit;
    }

    // Hapus foto lama
    if ($foto != "" && file_exists("images/" . $foto)) {
        unlink("images/" . $foto);
    }

    // Simpan foto baru
    $foto = time() . "_" . $namaFile;

    move_uploaded_file($tmp, "images/" . $foto);
}

// Update database
$query = mysqli_query($con, "
    UPDATE pegawai SET
        foto = '$foto',
        nama_pegawai = '$nama',
        jenis_kelamin = '$jk',
        tgl_lahir = '$tanggal',
        id_jabatan = '$jabatan'
    WHERE id = '$id'
");

if ($query) {

    echo "<script>
        alert('Data pegawai berhasil diperbarui');
        window.location='?hal=pegawai';
    </script>";

} else {

    echo "Gagal mengubah data.<br>";
    echo mysqli_error($con);

}
?>