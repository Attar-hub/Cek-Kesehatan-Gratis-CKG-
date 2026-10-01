<?php
include "koneksi.php";

$query = "SELECT * FROM pendaftaran ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran - SehatBersama</title>
    <link rel="stylesheet" href="style.css">
    <style>
    .form-container.admin-container {
        max-width: 95% !important;
        width: 95% !important;
        margin: 20px auto !important;
    }
    .table-responsive {
        width: 100%;
        overflow-x: auto;
        margin-bottom: 30px;
    }

    .admin-table th,
    .admin-table td {
        padding: 16px 20px !important; 
        border: 1px solid #b2c9c7 !important;
        vertical-align: middle;
    }
    .admin-table th {
        background: #4aa89c !important;
        color: white !important;
        font-weight: 600;
        text-align: center !important;
    }
    .admin-table td {
        text-align: center !important;
    }
    .admin-table td:nth-child(7),
    .admin-table td:nth-child(4) {
        text-align: left !important;
    }

    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <img src="image/logo-semarang.png" alt="Logo" class="nav-logo">
            Sehat<span>Bersama</span>
        </div>

        <div class="menu">
            <a href="index.html">Beranda</a>
            <a href="tentang.html">Tentang</a>
            <a href="layanan.html">Layanan</a>
            <a href="kontak.html">Kontak</a>
        </div>
    </nav>

    <section class="form-section">

        <!-- Menggunakan admin-container yang sudah dilebarkan di CSS -->
        <div class="form-container admin-container">

            <div class="form-header">
                <p class="small-title">ADMIN</p>
                <h1>Data Pendaftaran</h1>
                <p>Kelola data pendaftaran dan pesan yang masuk.</p>
            </div>

            <!-- Tabel Data Pendaftaran -->
            <div class="table-responsive">
                <table class="admin-table">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomor HP</th>
                        <th>Alamat</th>
                        <th>Pemeriksaan</th>
                        <th>Tanggal Pemeriksaan</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($data['nama_lengkap']); ?></td>
                            <td><?= htmlspecialchars($data['nik']); ?></td>
                            <td><?= date('d-m-Y', strtotime($data['tanggal_lahir'])); ?></td>
                            <td><?= htmlspecialchars($data['jenis_kelamin']); ?></td>
                            <td><?= htmlspecialchars($data['nomor_hp']); ?></td>
                            <td class="wrap-text"><?= htmlspecialchars($data['alamat']); ?></td>
                            <td><?= htmlspecialchars($data['pemeriksaan']); ?></td>
                            <td><?= date('d-m-Y', strtotime($data['tanggal_pemeriksaan'])); ?></td>
                            <td>
                                <a href="hapus_pendaftaran.php?id=<?= $data['id']; ?>"
                                   class="btn-hapus"
                                   onclick="return confirm('Yakin ingin menghapus data ini?');">
                                   🗑
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

            <h2 class="admin-section-title">Pesan Masuk</h2>

            <?php
            $query_pesan = "SELECT * FROM pesan ORDER BY id DESC";
            $result_pesan = mysqli_query($koneksi, $query_pesan);
            ?>

            <!-- Tabel Pesan Masuk -->
            <div class="table-responsive">
                <table class="admin-table">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                    $no_pesan = 1;
                    while ($data_pesan = mysqli_fetch_assoc($result_pesan)) {
                    ?>
                        <tr>
                            <td><?= $no_pesan++; ?></td>
                            <td><?= htmlspecialchars($data_pesan['nama']); ?></td>
                            <td><?= htmlspecialchars($data_pesan['email']); ?></td>
                            <!-- Kolom Pesan diberi class wrap-text -->
                            <td class="wrap-text"><?= htmlspecialchars($data_pesan['pesan']); ?></td>
                            <td><?= date('d-m-Y H:i:s', strtotime($data_pesan['tanggal'])); ?></td>
                            <td>
                                <a href="hapus_pesan.php?id=<?= $data_pesan['id']; ?>"
                                   class="btn-hapus"
                                   onclick="return confirm('Yakin ingin menghapus pesan ini?');">
                                   🗑
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

        </div>

    </section>

</body>

</html>