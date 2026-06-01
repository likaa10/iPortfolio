<?php
session_start();
include '../koneksi.php';

// Proteksi Keamanan: Hanya izinkan level siswa
if (!isset($_SESSION['status']) || $_SESSION['level'] != "siswa") {
    header("location:../login.php");
    exit();
}

// Ambil data login session
$user_login = $_SESSION['username'];

// Ambil data dari tabel akun (Pasti ada dan tidak akan error)
$query_akun = mysqli_query($conn, "SELECT * FROM akun WHERE username='$user_login'");
$data_akun = mysqli_fetch_assoc($query_akun);

// Variabel untuk nama lengkap siswa
$nama_siswa_asli = isset($data_akun['nama_lengkap']) ? $data_akun['nama_lengkap'] : $user_login;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Siswa - SMK INDONESIA RAYA</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .sidebar { height: 100vh; background-color: #1a252f; color: white; }
        .sidebar .nav-link { color: #aec6cf; padding: 12px 20px; }
        .sidebar .nav-link.active { background-color: #34495e; color: white; font-weight: bold; }
        .sidebar .nav-link:hover { background-color: #2c3e50; color: white; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar p-0 d-flex flex-column justify-content-between">
            <div>
                <div class="text-center py-4 border-bottom border-secondary">
                    <i class="bi bi-mortarboard text-white fs-2"></i>
                    <h6 class="fw-bold text-white mt-2 mb-0">SMK INDONESIA RAYA</h6>
                </div>
                <nav class="nav flex-column mt-3">
                    <a class="nav-link active" href="dashboard_siswa.php"><i class="bi bi-house-door me-2"></i> Dashboard</a>
                    <a class="nav-link" href="profil.php"><i class="bi bi-person-badge me-2"></i> Lihat Profil Saya</a>
                </nav>
            </div>
            <div class="p-3 border-top border-secondary">
                <a class="nav-link text-danger p-2 rounded" href="../logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </a>
            </div>
        </div>

        <div class="col-md-10 bg-light min-vh-100 p-4">
            <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm mb-4">
                <h5 class="fw-bold mb-0 text-secondary">Portal Siswa</h5>
                <div class="fw-semibold">Selamat Datang, <span class="text-primary"><?= $nama_siswa_asli; ?></span></div>
            </div>

            <div class="card border-0 shadow-sm p-5 text-center bg-white rounded-3">
                <i class="bi bi-mortarboard text-primary display-2 mb-3"></i>
                <h3 class="fw-bold">Halo, <?= $nama_siswa_asli; ?>!</h3>
                <p class="text-muted">Selamat datang di Sistem Informasi Akademik Sekolah. Akun Anda berstatus sebagai siswa aktif, Anda dapat melihat seluruh rangkuman biodata Anda melalui menu navigasi di sebelah kiri.</p>
                <div class="alert alert-info d-inline-block mx-auto px-4 py-2 mt-2" role="alert">
                    <i class="bi bi-info-circle me-2"></i> Hak Akses: <strong>Hanya Lihat Data Pribadi</strong>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>