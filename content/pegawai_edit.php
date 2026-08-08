<?php
if (!defined('INDEX')) {
    die("");
}

global $con;

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID Pegawai tidak valid";
    exit;
}

$id = (int)$_GET['id'];

$query = mysqli_query($con, "SELECT * FROM pegawai WHERE id = '$id'");

if (!$query) {
    die(mysqli_error($con));
}

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data pegawai tidak ditemukan";
    exit;
}
?>

<h2>Edit Pegawai</h2>

<form action="?hal=pegawai_update&id=<?= $data['id']; ?>" method="post" enctype="multipart/form-data">

    <div class="form-card">

        <!-- FOTO -->
        <div class="form-group">
            <label>Foto</label>

            <div class="input">

                <?php if ($data['foto'] != "") { ?>
                    <img src="images/<?= $data['foto']; ?>" width="100" style="margin-bottom:10px;border-radius:8px;">
                <?php } ?>

                <input type="file" name="foto">

                <input type="hidden" name="foto_lama" value="<?= $data['foto']; ?>">

                <small>Kosongkan jika tidak ingin mengganti foto.</small>

            </div>
        </div>

        <!-- NAMA -->
        <div class="form-group">
            <label>Nama</label>

            <div class="input">
                <input
                    type="text"
                    name="nama"
                    value="<?= htmlspecialchars($data['nama_pegawai']); ?>"
                    required>
            </div>
        </div>

        <!-- JENIS KELAMIN -->
        <div class="form-group">
            <label>Jenis Kelamin</label>

            <div class="input radio-group">

                <label>
                    <input
                        type="radio"
                        name="jk"
                        value="L"
                        <?= ($data['jenis_kelamin'] == 'L') ? 'checked' : ''; ?>>
                    Laki-laki
                </label>

                <label>
                    <input
                        type="radio"
                        name="jk"
                        value="P"
                        <?= ($data['jenis_kelamin'] == 'P') ? 'checked' : ''; ?>>
                    Perempuan
                </label>

            </div>
        </div>

        <!-- TANGGAL LAHIR -->
        <div class="form-group">
            <label>Tanggal Lahir</label>

            <div class="input">
                <input
                    type="date"
                    name="tanggal"
                    value="<?= $data['tgl_lahir']; ?>">
            </div>
        </div>

        <!-- JABATAN -->
        <div class="form-group">
            <label>Jabatan</label>

            <div class="input">

                <select name="jabatan">

                    <option value="">Pilih Jabatan</option>

                    <?php
                    $qjabatan = mysqli_query($con, "SELECT * FROM jabatan");

                    while ($j = mysqli_fetch_assoc($qjabatan)) {
                    ?>

                        <option
                            value="<?= $j['id']; ?>"
                            <?= ($data['id_jabatan'] == $j['id']) ? 'selected' : ''; ?>>

                            <?= $j['nama_jabatan']; ?>

                        </option>

                    <?php
                    }
                    ?>

                </select>

            </div>
        </div>

        <!-- TOMBOL -->
        <div class="form-group tombol-group">

            <div class="input">

                <input
                    type="submit"
                    value="Simpan"
                    class="tombol simpan">

                <input
                    type="reset"
                    value="Batal"
                    class="tombol riset">

            </div>

        </div>

    </div>

</form>