<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['level'] != "guru") {
    header("location:../login.php");
    exit();
}
$user_login = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - SMK INDONESIA RAYA</title>
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
                    <i class="bi bi-broadcast text-white fs-2"></i>
                    <h6 class="fw-bold text-white mt-2 mb-0">SMK INDONESIA RAYA</h6>
                </div>
                <nav class="nav flex-column mt-3">
                    <a class="nav-link" href="dashboard_guru.php"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                    <a class="nav-link active" href="data_siswa.php"><i class="bi bi-people me-2"></i> Lihat Data Siswa</a>
                    <a class="nav-link" href="data_kelas.php"><i class="bi bi-door-closed me-2"></i> Lihat Data Kelas</a>
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
                <h5 class="fw-bold mb-0 text-secondary">Data Siswa</h5>
                <div class="fw-semibold">Log In: <span class="text-success"><?= $user_login; ?></span></div>
            </div>

            <div class="card border-0 shadow-sm p-4 bg-white rounded-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0"><i class="bi bi-table text-primary me-2"></i>Daftar Siswa Aktif</h5>
                    <span class="badge bg-primary px-3 py-2">Total: 1 Siswa</span>
                </div>
                <table class="table table-hover table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>10029384</td>
                            <td>Malika Putri</td>
                            <td>XII RPL 1</td>
                            <td>Perempuan</td>
                            <td><span class="badge bg-success">Aktif</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>