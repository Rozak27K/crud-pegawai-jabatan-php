<?php
session_start();

require_once "library/config.php";

global $con;

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {

        $data = mysqli_fetch_assoc($query);

        $_SESSION['username'] = $data['username'];

        header("Location: index.php");
        exit();

    } else {

        echo "<p align='center'>LOGIN GAGAL</p>";
        header("Refresh:1; url=login.php");
        exit();

    }
}