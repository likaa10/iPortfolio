<?php
session_start();
include 'koneksi.php'; 

// 1. MEMBUAT KODE KEAMANAN ACAK (CAPTCHA)
// Jika kode belum dibuat atau halaman baru dibuka, generate angka acak 4 digit
if (!isset($_SESSION['captcha_code'])) {
    $_SESSION['captcha_code'] = rand(1000, 9999);
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $user_captcha = $_POST['captcha_input'];

    // 2. VALIDASI KODE KEAMANAN terlebih dahulu
    if ($user_captcha != $_SESSION['captcha_code']) {
        // Jika salah, acak kode baru dan beri peringatan
        $_SESSION['captcha_code'] = rand(1000, 9999);
        echo "<script>alert('Kode Keamanan Salah! Silakan coba lagi.'); window.location='login.php';</script>";
        exit();
    }

    // 3. VALIDASI USERNAME & PASSWORD KE DATABASE
    $query = mysqli_query($conn, "SELECT * FROM akun WHERE username='$username' AND password='$password'");
    
    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);

        // Simpan data login ke Session
        $_SESSION['status']   = "login";
        $_SESSION['username'] = $data['username'];
        $_SESSION['level']    = $data['level']; 

        // Hapus kode keamanan karena login sudah berhasil
        unset($_SESSION['captcha_code']);

        // Alihkan halaman sesuai level
        if ($data['level'] == "admin") {
            echo "<script>alert('Login Berhasil sebagai Admin!'); window.location='admin/dashboard.php';</script>";
            exit();
        } else if ($data['level'] == "guru") {
            echo "<script>alert('Login Berhasil sebagai Guru!'); window.location='guru/dashboard_guru.php';</script>";
            exit();
        } else if ($data['level'] == "siswa") {
            echo "<script>alert('Login Berhasil sebagai Siswa!'); window.location='siswa/dashboard_siswa.php';</script>";
            exit();
        } else {
            echo "<script>alert('Level akses tidak dikenal!'); window.location='login.php';</script>";
            exit();
        }
    } else {
        // Jika login gagal, acak ulang captcha
        $_SESSION['captcha_code'] = rand(1000, 9999);
        echo "<script>alert('Username atau Password Salah!'); window.location='login.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMKN 4 Bogor</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* KEMBALIKAN BACKGROUND GAMBAR SEKOLAH KAMU */
        body {
            background: url('assets/img/lapangan.jpeg') no-repeat center center fixed; /* Sesuaikan nama file gambar sekolahmu jika berbeda */
            background-size: cover;
            height: 100vh;
        }
        /* EFEK KOTAK BLUR transparan (Glassmorphism) seperti tampilan awalmu */
        .login-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 15px;
            width: 380px;
        }
        /* LOGO SEKOLAH BULAT DI ATAS FORM */
        .logo-circle {
            width: 80px;
            height: 80px;
            background-color: #2c3e50;
            border-radius: 50%;
            margin: 0 auto 15px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
        }
        .captcha-box {
            background: #e2e8f0;
            font-weight: bold;
            letter-spacing: 5px;
            text-align: center;
            font-size: 20px;
            user-select: none;
            border-radius: 5px;
            color: #2d3748;
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

    <div class="card login-card shadow p-4">
        <div class="logo-circle">
            <i class="bi bi-broadcast text-white fs-2"></i> </div>
        <h5 class="text-center fw-bold mb-4 text-dark">Form Login System</h5>
        
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary small">Username</label>
                <input type="text" name="username" class="form-control" required placeholder="Masukkan username">
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary small">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary small">Kode Keamanan</label>
                <div class="row g-2 align-items-center">
                    <div class="col-5">
                        <div class="captcha-box py-1 shadow-sm"><?= $_SESSION['captcha_code']; ?></div>
                    </div>
                    <div class="col-7">
                        <input type="number" name="captcha_input" class="form-control" required placeholder="Ketik angka di kiri">
                    </div>
                </div>
            </div>
            
            <button type="submit" name="login" class="btn btn-primary w-100 mt-2 py-2 fw-semibold shadow-sm">Masuk Sistem</button>
        </form>
    </div>

</body>
</html>