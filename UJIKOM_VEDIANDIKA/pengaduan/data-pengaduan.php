<?php
session_start();
$nis = $_SESSION['nis'];
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");
$sql = "SELECT input_aspirasi.*, kategori.ket_kategori FROM input_aspirasi LEFT JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori WHERE nis = '$nis'";
$query = mysqli_query($koneksi, $sql);
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

        .home-button button{
            border: none;
            border-radius:5px;
            height:40px;
            border: none;
            background-color: white;
        }

        .home-button button:hover{
            background-color: gray;
            color: white;
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
            transform: translateX(-60%);
        }

        h1{
            text-align: center;  
        }

        .box{
            margin-top: 80px;
            justify-content: center;
            align-items: center;
            border: 1px solid;
            border-radius: 6px;
            padding: 32px;
        }

        table{
            margin-top: 10px;
        }

        tr{
            text-align: center;
        }

        input{
            width: 350px;
        }

        .button-detail{
            border: none;
            border-radius: 5px;
            padding: 6px;
            cursor: pointer;
            background-color: darkcyan;
        }

        .button-detail:hover{
            background-color: #00473b;
            color: white;
        }

        a{
            text-decoration: none;
            color:inherit;
        }

        .popup{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .popup-detail{
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
        }

        .button-tutup{
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            background-color: darkcyan;
            cursor: pointer;
        }

        .button-tutup:hover{
            background-color: #00473b;
            color: white;
        }
    </style>
</head>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<body>
    <nav class="navbar">
        <div class="home-button">
            <a href="../index.php">
                <button>Halaman Utama</button>
            </a>
        </div>

        <div class="judul">
            <h1>Data Aspirasi</h1>
        </div>
    </nav>
    <nav class="box">
    </div>
    <div class="tabel">
        <table id="datatable" border="1" cellspacing="0" cellpadding="20">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Waktu</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php while($data = mysqli_fetch_array($query)){ ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nis'] ?></td>
                        <td><?= $data['ket_kategori'] ?></td>
                        <td><?= $data['lokasi'] ?></td>
                        <td><?= $data['ket'] ?></td>
                        <td><?= $data['status'] ?></td>
                        <td><?= date('d M Y', strtotime($data['waktu'])) ?></td>
                        <td>
                            <a href="?detail=<?= $data['id_pelapor']; ?>">
                                <button class="button-detail">Detail</button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
            if(isset($_GET['detail'])){
                $id = $_GET['detail'];
                $ambil = mysqli_query($koneksi, "SELECT input_aspirasi.*, kategori.ket_kategori FROM input_aspirasi LEFT JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori WHERE id_pelapor = '$id'");
                $detail = mysqli_fetch_array($ambil);
            ?>
                <div class="popup">
                    <div class="popup-detail">
                        <h3>Detail Pengaduan</h3>
                        <p><b>NIS:</b> <?= $detail['nis']; ?></p>
                        <p><b>Kategori:</b> <?= $detail['ket_kategori']; ?></p>
                        <p><b>Lokasi:</b> <?= $detail['lokasi']; ?></p>
                        <p><b>Keterangan:</b> <?= $detail['ket']; ?></p>
                        <p><b>Status:</b> <?= $detail['status']; ?></p>
                        <p><b>Waktu :</b><?= $detail['waktu'] ?></p>
                        <p><b>feedback:</b> <?= $detail['feedback']; ?></p>
                        <a href="data-pengaduan.php"><button class="button-tutup">Tutup</button></a>
                    </div>
                </div>
            <?php } ?>
    </div>
    </nav>
<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        "language": {
            "search": "Cari:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "paginate":{
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        }
    });
});
</script>
</body>
</html>