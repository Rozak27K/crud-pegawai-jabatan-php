<?php

$isRailway = getenv('RAILWAY_ENVIRONMENT') || getenv('RAILWAY_SERVICE_NAME');

$host = getenv('MYSQLHOST') ?: getenv('DB_HOST') ?: 'localhost';
$port = getenv('MYSQLPORT') ?: getenv('DB_PORT') ?: '3307';
$user = getenv('MYSQLUSER') ?: getenv('DB_USER') ?: 'root';
$pass = getenv('MYSQLPASSWORD') ?: getenv('DB_PASSWORD') ?: '';
$db = getenv('MYSQLDATABASE') ?: getenv('DB_DATABASE') ?: 'pegawai_db';

$databaseUrl = getenv('MYSQL_URL') ?: getenv('MYSQL_PUBLIC_URL') ?: getenv('DATABASE_URL');

if ($databaseUrl) {
    $mysqlUrl = parse_url($databaseUrl);

    $host = $mysqlUrl['host'] ?? $host;
    $port = $mysqlUrl['port'] ?? $port;
    $user = $mysqlUrl['user'] ?? $user;
    $pass = $mysqlUrl['pass'] ?? $pass;
    $db   = isset($mysqlUrl['path']) ? ltrim($mysqlUrl['path'], '/') : $db;
}

if ($isRailway && $host === 'localhost') {
    die("Koneksi gagal: variable MySQL belum tersambung ke service app PHP. Tambahkan MYSQL_URL atau variable MYSQLHOST, MYSQLPORT, MYSQLUSER, MYSQLPASSWORD, MYSQLDATABASE dari service MySQL ke service app.");
}

$con = mysqli_connect($host, $user, $pass, $db, (int) $port);

if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>
