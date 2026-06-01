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

// Ambil data dari tabel akun (Aman 100% dari error kolom)
$query_akun = mysqli_query($conn, "SELECT * FROM akun WHERE username='$user_login'");
$data_akun = mysqli_fetch_assoc($query_akun);

// Variabel data untuk ditampilkan di profil
$nama_siswa_asli = isset($data_akun['nama_lengkap']) ? $data_akun['nama_lengkap'] : $user_login;
$email_siswa = isset($data_akun['email']) ? $data_akun['email'] : '-';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - SMK INDONESIA RAYA</title>
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
                    <a class="nav-link" href="dashboard_siswa.php"><i class="bi bi-house-door me-2"></i> Dashboard</a>
                    <a class="nav-link active" href="profil.php"><i class="bi bi-person-badge me-2"></i> Lihat Profil Saya</a>
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
                <h5 class="fw-bold mb-0 text-secondary">Profil Siswa</h5>
                <div class="fw-semibold">Log In: <span class="text-primary"><?= $nama_siswa_asli; ?></span></div>
            </div>

            <div class="card border-0 shadow-sm p-4 bg-white rounded-3">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-person-lines-fill text-primary fs-1 me-3"></i>
                    <div>
                        <h4 class="fw-bold mb-0">Biodata Diri Anda</h4>
                        <p class="text-muted mb-0 small">Data resmi akun siswa yang terdaftar di sistem.</p>
                    </div>
                </div>
                
                <table class="table table-striped table-bordered mt-2">
                    <tr>
                        <th width="30%" class="bg-light fw-semibold">Nama Lengkap</th>
                        <td><?= $nama_siswa_asli; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light fw-semibold">Username Sistem</th>
                        <td><?= $user_login; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light fw-semibold">Email Terdaftar</th>
                        <td><?= $email_siswa; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light fw-semibold">Hak Akses Sistem</th>
                        <td><span class="badge bg-success">Siswa Aktif</span></td>
                    </tr>
                </table>
                
                <div class="alert alert-info mt-3 mb-0 py-2 small" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> Akun Anda sudah terintegrasi dengan database pusat. Siap digunakan untuk presentasi!
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>