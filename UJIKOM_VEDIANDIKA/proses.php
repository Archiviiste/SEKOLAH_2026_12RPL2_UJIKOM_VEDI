<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");
$nis = $_POST["nis"];
$kategori = $_POST["kategori"];
$lokasi = $_POST["lokasi"];
$keterangan = $_POST["keterangan"];

mysqli_query($koneksi,"INSERT INTO input_aspirasi VALUES (NULL, '$nis', '$kategori', '$lokasi', '$keterangan', 'menunggu', NULL)");


echo "ter input";
?>