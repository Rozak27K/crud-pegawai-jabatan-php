<?php

$host = getenv('MYSQLHOST') ?: getenv('DB_HOST') ?: 'localhost';
$port = getenv('MYSQLPORT') ?: getenv('DB_PORT') ?: '3307';
$user = getenv('MYSQLUSER') ?: getenv('DB_USER') ?: 'root';
$pass = getenv('MYSQLPASSWORD') ?: getenv('DB_PASSWORD') ?: '';
$db   = getenv('MYSQLDATABASE') ?: getenv('DB_DATABASE') ?: 'pegawai_db';

if (getenv('MYSQL_URL')) {
    $mysqlUrl = parse_url(getenv('MYSQL_URL'));

    $host = $mysqlUrl['host'] ?? $host;
    $port = $mysqlUrl['port'] ?? $port;
    $user = $mysqlUrl['user'] ?? $user;
    $pass = $mysqlUrl['pass'] ?? $pass;
    $db   = isset($mysqlUrl['path']) ? ltrim($mysqlUrl['path'], '/') : $db;
}

$con = mysqli_connect($host, $user, $pass, $db, (int) $port);

if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>
