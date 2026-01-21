<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$user = mysqli_fetch_assoc($query);

if($user){
    if(password_verify($password, $user['password'])){
        $_SESSION['username'] = $user['username'];
        $_SESSION['nis'] = $user['nis'];
        $_SESSION['role'] = $user['role'];
        header("Location:index.php");
        exit;
    } else {
        header("Location: login.php?error=Password salah");
        exit;
    }
} else {
    header("Location: login.php?error=Username tidak ditemukan");
    exit;
}
