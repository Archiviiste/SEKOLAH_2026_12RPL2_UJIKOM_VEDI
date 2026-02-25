<?php

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");

$nis = $_POST["nis"];
$kategori = $_POST["kategori"];
$lokasi = $_POST["lokasi"];
$keterangan = $_POST["keterangan"];

$query = mysqli_query($koneksi,
    "INSERT INTO input_aspirasi 
    VALUES (NULL, '$nis', '$kategori', '$lokasi', '$keterangan', 'menunggu', NULL, CURRENT_TIMESTAMP)"
);

// buat link pop up di halaman pengaduan 
if ($query) {
    header("Location: halaman-pengaduan.php?status=success");
} else {
    header("Location: halaman-pengaduan.php?status=error");
}
exit;
