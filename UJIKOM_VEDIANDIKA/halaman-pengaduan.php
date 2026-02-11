<?php
session_start();
$nis = $_SESSION['nis'] ?? '';
?>
<!-- buat tawu statusnya eror atau berhasil -->
<?php
$success = isset($_GET['status']) && $_GET['status'] == 'success';
?>
<?php
$status = $_GET['status'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
<head>
    <title>Document</title>
    <style>

        *{
            font-family: "Quicksand", sans-serif;
            font-optical-sizing: auto;
            font-weight: 700;
            font-style: normal;
        }

        body{
            margin: 0;
            flex-direction: column;
            padding: 0;
            height: 100vh;
            background: wheat;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: rgb(0, 0, 0, 0.3);
            display: flex;
            align-items: center;  
            padding: 0 20px; 
        }

        h1{
            justify-content: center;
            align-items: center; 
            text-align: center;
        }

        .box{
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid;
            border-radius: 6px;
            padding: 50px;
            width: 300px;
            margin: auto;
        }

        select, input, textarea{
            width: 300px;
            border-radius: 8px;
            border: 1px solid;
            padding: 5px;
            resize: vertical;
        }

        select{
            width: 313px;
        }

        .tombol{
            display: flex;
            justify-content: center;
        }

        button{
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .button1{
            height: 30px;
            margin-top: 10px;
            border: none;
            border-radius: 3px;
            width: 300px;
            background-color: darkcyan;
        }

        .button1:hover{
            background-color: #026353;
        }

        .home-button{
            width: 100px;
        }

        .home-button button:hover{
            background-color: gray;
        }

        .home-button button {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            height: 40px;
        }

        .judul {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        a{
            text-decoration: none;
            color:inherit;
        }

        option{
            border-radius: 5px;
        }

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }


        .popup-pengaduan {
            background: white;
            padding: 30px;
            border-radius: 8px;
            width: 350px;
            text-align: center;
        }


        .popup-pengaduan a {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 15px;
            background: darkcyan;
            color: white;
            border-radius: 5px;
        }


    </style>
</head>
<body>
    <nav class="navbar">
        <div class="home-button">
            <a href="index.php">
                <button>Halaman Utama</button>
            </a>
        </div>

        <div class="judul">
            <h1>Form Pengaduan</h1>
        </div>
    </nav>

    <nav class="box">
    <form action="proses-halaman-pengaduan.php" method="post">
        <div>
            <label for="">NIS</label>
            <br>
            <input type="text" name="nis" value="<?= htmlspecialchars($nis) ?>" readonly required>
        </div>
        <div>
            <label for="kategori">Kategori</label>
            <br>
            <select id="kategori" name="kategori" required>
                <option value="" selected hidden>Pilih Kategori</option>
                <option value="1">Elektronik</option>
                <option value="2">Kebersihan</option>
                <option value="3">Fasilitas</option>
                <option value="4">Pelayanan</option>
            </select>
        </div>
        <div>
            <label for="">Lokasi</label>
            <br>
            <input type="text" name="lokasi" required>
        </div>
        <div>
            <label for="">Keterangan</label>
            <br>
            <textarea required name="keterangan"></textarea>
        </div>
        <div class="tombol">
        <button class="button1">Kirim</button>
        </div>
    </form>
    </nav>
    <!-- pop up di halama pengaduan -->
    <?php if ($success): ?>
        <div class="popup">
            <div class="popup-pengaduan">
                <h2>Berhasil</h2>
                <p>Pengaduan kamu berhasil dikirim.</p>
                <a href="halaman-pengaduan.php">OK</a>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($status == 'error'): ?>
    <div class="popup">
        <div class="popup-pengaduan">
            <h2>Gagal </h2>
            <p>Data tidak valid atau belum terdaftar.</p>
            <a href="halaman-pengaduan.php">Coba Lagi</a>
        </div>
    </div>
    <?php endif; ?>


</body>
</html>