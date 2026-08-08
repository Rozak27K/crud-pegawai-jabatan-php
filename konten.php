<?php
    if(!defined('INDEX')) die("");

    $halaman = array("dashboard",
        "pegawai", "pegawai_tambah", "pegawai_insert",
        "pegawai_edit", "pegawai_update", "pegawai_hapus",
        "jabatan", "jabatan_tambah", "jabatan_insert",
        "jabatan_edit", "jabatan_update", "jabatan_hapus");

    $hal = isset($_GET['hal']) ? $_GET['hal'] : 'dashboard';

    if (in_array($hal, $halaman)) {
        include "content/$hal.php";
    }
?>  