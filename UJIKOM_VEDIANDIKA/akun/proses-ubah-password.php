<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");

$nis = $_SESSION['nis'];

$password_lama = $_POST['password_lama'];
$password_baru = $_POST['password_baru'];
$konfirmasi = $_POST['konfirmasi'];

// Ambil data user
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE nis='$nis'");
$data = mysqli_fetch_array($query);

// 1️⃣ Cek password lama pakai password_verify
if(!password_verify($password_lama, $data['password'])){
    header("Location: halaman-akun.php?status=error");
    exit;
}

// 2️⃣ Cek konfirmasi password
if($password_baru !== $konfirmasi){
    header("Location: halaman-akun.php?status=error");
    exit;
}

// 3️⃣ Hash password baru
$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

// 4️⃣ Update ke database
mysqli_query($koneksi, "UPDATE user 
                        SET password='$password_hash' 
                        WHERE nis='$nis'");

header("Location: halaman-akun.php?status=success");
exit;
