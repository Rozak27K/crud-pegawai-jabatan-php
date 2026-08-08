<?php
if (!defined('INDEX')) die("");
global $con;
?>

<h2 class="judul">Data Pegawai </h2>
<a href="?hal=jabatan_tambah" class="tombol">Tambah</a>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "SELECT * FROM jabatan ORDER BY id DESC");
        $no = 0;
        while ($data = mysqli_fetch_assoc($query)) {
            $no++;
        
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data['nama_jabatan'] ?></td>
            <td>
                <a class="tombol edit" href="?hal=jabatan_edit&id=<?= $data['id'] ?>">
                    Edit
                </a>

                <a class="tombol hapus" href="?hal=jabatan_hapus&id=<?= $data['id'] ?>"
                onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>