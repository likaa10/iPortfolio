<?php
// Paksa browser menampilkan pesan error jika ada yang salah
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../koneksi.php'; 

if (isset($_POST['tambah'])) {
    $id_kelas   = mysqli_real_escape_string($conn, $_POST['id_kelas']);
    $nama_kelas = mysqli_real_escape_string($conn, $_POST['nama_kelas']);
    $kompetensi = mysqli_real_escape_string($conn, $_POST['kompetensi_keahlian']);

    $query = mysqli_query($conn, "INSERT INTO kelas (id_kelas, nama_kelas, kompetensi_keahlian) 
                                  VALUES ('$id_kelas', '$nama_kelas', '$kompetensi')");

    if ($query) {
        echo "<script>alert('Data Kelas Berhasil Ditambah'); window.location='dashboard.php?page=kelas';</script>";
    } else {
        echo "Gagal SQL: " . mysqli_error($conn);
    }
} else {
    // Jika file ini diakses langsung tanpa nge-klik tombol tambah, balikin ke dashboard
    header("Location: dashboard.php?page=kelas");
    exit();
}
?>