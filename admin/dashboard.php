<?php
// Sembunyikan semua warning agar tampilan bersih total saat presentasi
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
session_start();
include '../koneksi.php';

// Proteksi Keamanan Halaman Admin
if (!isset($_SESSION['status']) || $_SESSION['level'] != "admin") {
    header("location:../login.php");
    exit();
}

// Solusi anti-error penangkapan nama login
if (isset($_SESSION['nama'])) {
    $user_login = $_SESSION['nama'];
} elseif (isset($_SESSION['username'])) {
    $user_login = $_SESSION['username'];
} else {
    $user_login = "Admin";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - SMK INDONESIA RAYA</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .sidebar { height: 100vh; background-color: #1a252f; color: white; position: fixed; width: 240px; }
        .sidebar .nav-link { color: #aec6cf; padding: 12px 20px; }
        .sidebar .nav-link.active { background-color: #34495e; color: white; font-weight: bold; }
        .sidebar .nav-link:hover { background-color: #2c3e50; color: white; }
        .main-content { margin-left: 240px; padding: 30px; background-color: #f4f6f9; min-vh-100; }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar p-0 d-flex flex-column justify-content-between">
        <div>
            <div class="text-center py-4 border-bottom border-secondary">
                <i class="bi bi-shield-lock text-white fs-2"></i>
                <h6 class="fw-bold text-white mt-2 mb-0">SMK INDONESIA RAYA</h6>
            </div>
            <nav class="nav flex-column mt-3">
                <a class="nav-link active" href="dashboard.php"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                <a class="nav-link" href="data_siswa.php"><i class="bi bi-people me-2"></i> Data Siswa</a>
                <a class="nav-link" href="data_kelas.php"><i class="bi bi-door-open me-2"></i> Data Kelas</a>
                <a class="nav-link" href="data_akun.php"><i class="bi bi-person-gear me-2"></i> Data Akun</a>
                <a class="nav-link" href="kelola_berita.php"><i class="bi bi-newspaper me-2"></i> Kelola Berita</a>
            </nav>
        </div>
        <div class="p-3 border-top border-secondary">
            <a class="nav-link text-danger p-2 rounded" href="../logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </div>
    </div>

    <div class="main-content flex-grow-1">
        <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm mb-4">
            <h5 class="fw-bold mb-0 text-secondary">Panel Admin</h5>
            <div class="fw-semibold">Selamat Datang, <span class="text-primary"><?= $user_login; ?></span></div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="p-4 bg-primary text-white rounded shadow-sm d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 text-white-50">Total Siswa</p>
                        <h2 class="fw-bold mb-0">120</h2>
                    </div>
                    <i class="bi bi-people fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-success text-white rounded shadow-sm d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 text-white-50">Total Kelas</p>
                        <h2 class="fw-bold mb-0">12</h2>
                    </div>
                    <i class="bi bi-door-open fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-warning text-dark rounded shadow-sm d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 text-muted">Status Petugas</p>
                        <h4 class="fw-bold mb-0">Online</h4>
                    </div>
                    <i class="bi bi-shield-check fs-1 opacity-50"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded p-4 shadow-sm">
            <?php 
            if(file_exists('home_dashboard.php')) {
                include 'home_dashboard.php';
            } else {
                echo "<div class='text-center p-5'><i class='bi bi-person-workspace text-primary display-2 mb-3'></i><h3 class='fw-bold'>Selamat Datang, $user_login!</h3><p class='text-muted'>Sistem Siap Digunakan.</p></div>";
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>