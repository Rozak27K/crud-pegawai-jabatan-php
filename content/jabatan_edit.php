<?php
if (!defined('INDEX')) {
    die("");
}

global $con;

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID jabatan tidak valid";
    exit;
}

$id = (int) $_GET['id'];

$query = mysqli_query(
    $con,
    "SELECT * FROM jabatan WHERE id = $id"
);

if (!$query) {
    die("Query error: " . mysqli_error($con));
}

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data jabatan tidak ditemukan";
    exit;
}
?>

<form action="?hal=jabatan_update&id=<?= $data['id']; ?>" method="post">

    <div class="form-card">

        <div class="form-group">
            <label for="nama">Nama</label>

            <div class="input">
                <input
                    type="text"
                    name="nama"
                    id="nama"
                    value="<?= htmlspecialchars($data['nama_jabatan']); ?>"
                    required
                >
            </div>
        </div>

        <div class="form-group tombol-group">
            <div class="input">
                <input
                    type="submit"
                    value="Simpan"
                    class="tombol simpan"
                >

                <input
                    type="reset"
                    value="Batal"
                    class="tombol riset"
                >
            </div>
        </div>

    </div>

</form>