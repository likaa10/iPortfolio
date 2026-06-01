<?php
// Memulai sesi untuk mengenali sesi yang aktif
session_start();

// Menghapus semua data sesi login
session_unset();
session_destroy();

// Mengarahkan kembali pengguna ke halaman login utama
echo "<script>
    alert('Anda telah berhasil logout.');
    window.location='login.php';
</script>";
exit();
?>