<?php
include '../koneksi.php'; // Pakai ../ karena koneksi ada di luar folder admin

if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];
    
    // Hapus data berdasarkan NIS
    $query = mysqli_query($conn, "DELETE FROM siswa WHERE nis = '$nis'");

    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus'); window.location='dashboard.php?page=siswa';</script>";
    } else {
        echo "Gagal menghapus: " . mysqli_error($conn);
    }
}
?>