<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "pegawai_db";

$con = mysqli_connect("localhost:3307", "root", "", "pegawai_db");

if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>
