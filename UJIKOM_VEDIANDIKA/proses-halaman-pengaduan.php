<?php
mysqli_report(MYSQLI_REPORT_OFF);
error_reporting(0);

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");

$nis = $_POST["nis"];
$kategori = $_POST["kategori"];
$lokasi = $_POST["lokasi"];
$keterangan = $_POST["keterangan"];

$query = mysqli_query($koneksi,
    "INSERT INTO input_aspirasi 
    VALUES (NULL, '$nis', '$kategori', '$lokasi', '$keterangan', 'menunggu', NULL)"
);

if ($query) {
    header("Location: halaman-pengaduan.php?status=success");
} else {
    header("Location: halaman-pengaduan.php?status=error");
}
exit;
