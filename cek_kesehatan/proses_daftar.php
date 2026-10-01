<?php

include "koneksi.php";

$nama_lengkap = $_POST['nama_lengkap'];
$nik = $_POST['nik'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nomor_hp = $_POST['nomor_hp'];
$alamat = $_POST['alamat'];
$pemeriksaan = $_POST['pemeriksaan'];
$tanggal_pemeriksaan = $_POST['tanggal_pemeriksaan'];

$query = "INSERT INTO pendaftaran 
(nama_lengkap, nik, tanggal_lahir, jenis_kelamin, nomor_hp, alamat, pemeriksaan, tanggal_pemeriksaan)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $query);

mysqli_stmt_bind_param(
    $stmt,
    "ssssssss",
    $nama_lengkap,
    $nik,
    $tanggal_lahir,
    $jenis_kelamin,
    $nomor_hp,
    $alamat,
    $pemeriksaan,
    $tanggal_pemeriksaan
);

if (mysqli_stmt_execute($stmt)) {
    header("Location: berhasil.html");
    exit;
} else {
    echo "Pendaftaran gagal: " . mysqli_error($koneksi);
}

?>