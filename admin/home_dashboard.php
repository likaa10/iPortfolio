<?php
// Sembunyikan semua warning agar tampilan bersih total saat presentasi
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

// Sinkronisasi variabel nama agar tidak memicu Undefined Array Key
if (!isset($user_login)) {
    session_start();
    if (isset($_SESSION['nama'])) {
        $user_login = $_SESSION['nama'];
    } elseif (isset($_SESSION['username'])) {
        $user_login = $_SESSION['username'];
    } else {
        $user_login = "Admin";
    }
}
?>
<div class="text-center p-4">
    <div class="mx-auto mb-3 bg-light rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 100px; height: 100px;">
        <i class="bi bi-person-check-fill text-success display-5"></i>
    </div>
    
    <h3 class="fw-bold text-dark">Halo, <?php echo $user_login; ?>!</h3>
    <p class="text-muted mx-auto" style="max-width: 600px;">
        Selamat bekerja. Anda masuk menggunakan hak akses penuh sebagai Administrator Sistem Informasi Akademik Sekolah. Pilih menu di samping kiri untuk mulai mengelola data.
    </p>
    
    <div class="alert alert-success d-inline-block px-4 py-2 mt-2 small" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> Database Terkoneksi Sempurna & Siap Dipresentasikan!
    </div>
</div>