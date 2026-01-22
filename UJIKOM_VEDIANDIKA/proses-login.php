<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$data = mysqli_fetch_assoc($query);

if($data){
    if(password_verify($password, $data['password'])){
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];
        header("Location:index.php");
        if($data['role'] == 'admin')
            {
                header("Location:admin/admin.php");
            }
        elseif($data['role'] == 'siswa')
            {
                header("Location:index.php");
            }
        exit;
    } else {
        header("Location: login.php?error=Password salah");
        exit;
    }

} else {
    header("Location: login.php?error=Username tidak ditemukan");
}
