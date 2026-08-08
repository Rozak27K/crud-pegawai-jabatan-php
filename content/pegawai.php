<?php
if (!defined('INDEX')) die("");
global $con;
?>

<h2 class="judul">Data Pegawai </h2>
<a href="?hal=pegawai_tambah" class="tombol">Tambah</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Jabatan</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    <?php
    $no = 1;

    $query = mysqli_query($con, "
        SELECT pegawai.*, jabatan.nama_jabatan
        FROM pegawai
        LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id
    ");

    while ($data = mysqli_fetch_assoc($query)) {
    ?>

        <tr>
            <td><?= $no++; ?></td>

            <td>
                <?php if (!empty($data['foto'])) { ?>
                    <img src="images/<?= htmlspecialchars($data['foto']); ?>" width="80">
                <?php } else { ?>
                    Tidak ada foto
                <?php } ?>
            </td>

            <td><?= htmlspecialchars($data['nama_pegawai']); ?></td>

            <td><?= htmlspecialchars($data['jenis_kelamin']); ?></td>

            <td><?= htmlspecialchars($data['tgl_lahir']); ?></td>

            <td><?= htmlspecialchars($data['nama_jabatan']); ?></td>

            <td>
                -
            </td>

            <td>
                <a class="tombol edit" href="?hal=pegawai_edit&id=<?= $data['id'] ?>">
                    Edit
                </a>
                
                <a class="tombol hapus" href="?hal=pegawai_hapus&id=<?= $data['id'] ?>"
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