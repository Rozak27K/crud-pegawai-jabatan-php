<?php
if (!defined('INDEX')) {
    die("");
}

global $con;

$error = "";
$nama_foto = "";

// Proses upload foto
if (isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $ukuran_file = $_FILES['foto']['size'];

    $ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

    if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
        $error = "Tipe file tidak didukung!";
    } elseif ($ukuran_file > 1024 * 1024) {
        $error = "Ukuran file terlalu besar (lebih dari 1MB)!";
    } else {

        $nama_foto = time() . '_' . $foto;

        move_uploaded_file(
            $lokasi,
            "images/" . $nama_foto
        );
    }
}

// Kalau tidak ada error, simpan ke database
if ($error == "") {

    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $jk = mysqli_real_escape_string($con, $_POST['jk']);
    $jabatan = (int) $_POST['jabatan'];

    $query = mysqli_query(
        $con,
        "INSERT INTO pegawai SET
            foto = '$nama_foto',
            nama_pegawai = '$nama',
            jenis_kelamin = '$jk',
            id_jabatan = '$jabatan'"
    );

    if ($query) {
        echo "<script>
            alert('Data berhasil disimpan!');
            window.location='?hal=pegawai';
        </script>";
        exit;
    } else {
        echo "Tidak dapat menyimpan data!<br>";
        echo mysqli_error($con);
    }

} else {

    echo $error;

    echo "<script>
        setTimeout(function() {
            window.location='?hal=pegawai_tambah';
        }, 1000);
    </script>";

    exit;
}
?>