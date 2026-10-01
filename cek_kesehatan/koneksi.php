<?php

$koneksi = mysqli_connect("localhost", "root", "", "cek_kesehatan");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>