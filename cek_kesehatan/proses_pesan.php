<?php

include "koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$query = "INSERT INTO pesan (nama, email, pesan)
          VALUES ('$nama', '$email', '$pesan')";

if (mysqli_query($koneksi, $query)) {
    header("Location: pesan_berhasil.html");
    exit;
} else {
    echo "Gagal menyimpan pesan: " . mysqli_error($koneksi);
}

?>