<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
session_start();
include '../koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['level'] != "admin") {
    header("location:../login.php");
    exit();
}

$user_login = isset($_SESSION['nama']) ? $_SESSION['nama'] : (isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Akun - Panel Admin</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .sidebar { height: 100vh; background-color: #1a252f; color: white; position: fixed; width: 240px; }
        .sidebar .nav-link { color: #aec6cf; padding: 12px 20px; }
        .sidebar .nav-link.active { background-color: #34495e; color: white; font-weight: bold; }
        .sidebar .nav-link:hover { background-color: #2c3e50; color: white; }
        .main-content { margin-left: 240px; padding: 30px; background-color: #f4f6f9; min-vh-100; }
        .table-responsive { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
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
                <a class="nav-link" href="dashboard.php"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                <a class="nav-link" href="data_siswa.php"><i class="bi bi-people me-2"></i> Data Siswa</a>
                <a class="nav-link" href="data_kelas.php"><i class="bi bi-door-open me-2"></i> Data Kelas</a>
                <a class="nav-link active" href="data_akun.php"><i class="bi bi-person-gear me-2"></i> Data Akun</a>
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
            <h5 class="fw-bold mb-0 text-secondary"><i class="bi bi-person-gear me-2"></i> Data Akun</h5>
            <div class="fw-semibold">Petugas: <span class="text-primary"><?= $user_login; ?></span></div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-4 bg-white rounded-3">
                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-person-plus-fill me-1"></i> Registrasi Akun</h5>
                    <form id="formAkun">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Username</label>
                            <input type="text" class="form-control" placeholder="Username baru" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Password</label>
                            <input type="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Level Akses</label>
                            <select class="form-select"><option value="admin">Admin / Petugas</option><option value="guru">Guru</option></select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold shadow-sm"><i class="bi bi-shield-check me-1"></i> Buat Akun Sistem</button>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="table-responsive border-0 shadow-sm">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr><th>No</th><th>Username</th><th>Password</th><th>Level</th><th class="text-center">Aksi</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="fw-bold">admin</td>
                                <td class="text-muted small"><em>$2y$10$92IXUNpkjO...</em></td>
                                <td><span class="badge bg-danger">Admin</span></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" onclick="alert('Sukses: Data akun berhasil dimuat!')" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                                        <button type="button" onclick="if(confirm('Hapus akun ini?')) alert('Sukses: Akun pengguna dihapus!');" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('formAkun').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Sukses: Registrasi akun baru berhasil disimpan!');
    });
</script>
</body>
</html>