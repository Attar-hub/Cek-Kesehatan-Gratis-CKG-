<?php

include "koneksi.php";

$id = $_GET['id'];

$query = "DELETE FROM pendaftaran WHERE id = ?";

$stmt = mysqli_prepare($koneksi, $query);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: admin.php");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}

?>