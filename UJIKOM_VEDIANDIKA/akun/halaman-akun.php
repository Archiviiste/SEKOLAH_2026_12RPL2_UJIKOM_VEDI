<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");

if(!isset($_SESSION['nis'])){
    header("Location: ../login/login.php");
    exit;
}
$nis = $_SESSION['nis'];

// Ambil data user
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE nis='$nis'");
$data = mysqli_fetch_array($query);

// status popup
$status = $_GET['status'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

<head>
<title>Halaman Akun</title>

<style>
*{
    font-family: "Quicksand", sans-serif;
    font-weight: 700;
}

body{
    margin:0;
    padding:0;
    background:wheat;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.navbar{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:60px;
    background-color: rgb(0,0,0,0.3);
    display:flex;
    align-items:center;
    padding:0 20px;
}

.home-button button{
    border: none;
    border-radius:5px;
    height:40px;
}

.home-button button:hover{
    background-color: gray;
    color:white;
}

.judul{
    position:absolute;
    left:50%;
    transform:translateX(-50%);
}

.container{
    margin-top:80px;
    display:flex;
    gap:30px;
}

.box{
    border:1px solid;
    border-radius:8px;
    padding:50px;
    width:500px;
    background:white;
    transition: all 0.3s ease;
}

.box:hover{
    box-shadow:0 0 10px rgba(0,0,0,0.5);
    transform: translateY(-2px);

}

.box-password{
    border:1px solid;
    border-radius:8px;
    padding:50px;
    width:500px;
    background:white;
    transition: all 0.3s ease;
}

.box-password:hover{
    box-shadow:0 0 10px rgba(0,0,0,0.5);
    transform: translateY(-2px);

}

label{
    display:block;
    margin-top:15px;
}

input{
    width:95%;
    border-radius:8px;
    border:1px solid;
    padding:6px;
}

button{
    cursor:pointer;
}

.button1{
    margin-top:20px;
    height:35px;
    width:100%;
    border:none;
    border-radius:5px;
    background:darkcyan;
    color:white;
}

.button1:hover{
    background:#026353;
}

.popup{
    position:fixed;
    top:0;left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
    display:flex;
    justify-content:center;
    align-items:center;
}

.popup-box{
    background:white;
    padding:30px;
    border-radius:8px;
    text-align:center;
    width:350px;
}

.popup-box a{
    display:inline-block;
    margin-top:20px;
    padding:8px 15px;
    background:darkcyan;
    color:white;
    border-radius:5px;
    text-decoration:none;
}
</style>
</head>

<body>

<nav class="navbar">
    <div class="home-button">
        <a href="../index.php"><button>Halaman Utama</button></a>
    </div>
    <div class="judul">
        <h1>Halaman Akun</h1>
    </div>
</nav>

<div class="container">

    <!-- INFORMASI AKUN -->
    <div class="box">
        <h2>Informasi Akun</h2>

        <label>Username</label>
        <input type="text" value="<?= $data['username']; ?>" readonly>

        <label>Password</label>
        <input type="password" value="********" readonly>

        <label>NIS</label>
        <input type="text" value="<?= $data['nis']; ?>" readonly>

        <label>Kelas</label>
        <input type="text" value="<?= $data['kelas']; ?>" readonly>
    </div>

    <!-- UBAH PASSWORD --> 
    <div class="box-password">
        <h2>Ubah Password</h2>

        <form action="proses-ubah-password.php" method="post">
            <label>Password Lama</label>
            <input type="text" name="password_lama" required>

            <label>Password Baru</label>
            <input type="text" name="password_baru" required>

            <label>Konfirmasi Password Baru</label>
            <input type="text" name="konfirmasi" required>

            <button class="button1">Ubah</button>
        </form>
    </div>

</div>

<!-- POPUP -->
<?php if($status == 'success'): ?>
<div class="popup">
    <div class="popup-box">
        <h2>Berhasil</h2>
        <p>Password berhasil diubah.</p>
        <a href="halaman-akun.php">OK</a>
    </div>
</div>
<?php endif; ?>

<?php if($status == 'error'): ?>
<div class="popup">
    <div class="popup-box">
        <h2>Gagal</h2>
        <p>Password lama salah atau konfirmasi tidak cocok.</p>
        <a href="halaman-akun.php">Coba Lagi</a>
    </div>
</div>
<?php endif; ?>

</body>
</html>
