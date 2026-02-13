<?php

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$password_hash = password_hash('password', PASSWORD_DEFAULT);

$query = mysqli_query($koneksi, "INSERT INTO user VALUES (null, '$nama', '$password_hash', 'siswa', '$nis', '$kelas')");

if ($query) {
    header("Location: form-siswa.php?status=success");
}