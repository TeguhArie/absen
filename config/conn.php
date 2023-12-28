<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "absen";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("koneksi Gagal :".mysqli_connect_error());
}

?>