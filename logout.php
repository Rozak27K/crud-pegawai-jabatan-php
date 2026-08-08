<?php
    session_start();
    session_destroy();
    echo"<p align='center'>Anda Telah Logout</p>";
    header("refresh:1 ; url=login.php");
    exit();

?>