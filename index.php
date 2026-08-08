<?php
session_start();
ob_start();

include "library/config.php";

if (!isset($_SESSION['username'])) {
    echo "<p align='center'>Anda harus login terlebih dahulu!!</p>";
    header("Refresh:1; url=login.php");
    exit();
}

define("INDEX", true);

$hal = $_GET['hal'] ?? 'dashboard';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        Aplikasi Manajemen Pegawai
    </header>

    <div class="container">
        <aside>

            <ul class="menu">
                <li>
                    <a href="?hal=dashboard"
                        class="<?= $hal === 'dashboard' ? 'aktif' : ''; ?>">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="?hal=pegawai"
                        class="<?= in_array($hal, [
                                    'pegawai',
                                    'pegawai_tambah',
                                    'pegawai_insert',
                                    'pegawai_edit',
                                    'pegawai_update',
                                    'pegawai_hapus'
                                ]) ? 'aktif' : ''; ?>">
                        Data Pegawai
                    </a>
                </li>

                <li>
                    <a href="?hal=jabatan"
                        class="<?= in_array($hal, [
                                    'jabatan',
                                    'jabatan_tambah',
                                    'jabatan_insert',
                                    'jabatan_edit',
                                    'jabatan_update',
                                    'jabatan_hapus'
                                ]) ? 'aktif' : ''; ?>">
                        Data Jabatan
                    </a>
                </li>

                <li>
                    <a href="logout.php" class="logout">
                        Keluar
                    </a>
                </li>
            </ul>

        </aside>
        <section class="main">

            <?php include "./konten.php"; ?>

        </section>
    </div>

    <footer>
        Copyright &copy; Jak
    </footer>
</body>

</html>