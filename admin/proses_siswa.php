<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nis            = $_POST['nis'];
    $nama_siswa     = $_POST['nama_siswa'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $alamat         = $_POST['alamat'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];

    $query = mysqli_query($conn, "INSERT INTO siswa VALUES ('$nis', '$nama_siswa', '$jenis_kelamin', '$alamat', '$tanggal_lahir')");

    if ($query) {
        header("Location: data_siswa.php?pesan=berhasil");
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>