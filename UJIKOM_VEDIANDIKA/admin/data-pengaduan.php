<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");
$sql = "SELECT input_aspirasi.*, kategori.ket_kategori FROM input_aspirasi LEFT JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori";
$sqldetail =
$query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
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

        h1{
          text-align: center;  
        }

        .box{
            
            justify-content: center;
            align-items: center;
            border: 1px solid;
            border-radius: 6px;
            padding: 32px;
        }

        .tabel{
            margin-top: 10px;
        }

        input{
            width: 350px;
        }

        .tombol{
            display: flex;
            justify-content: start;
            gap: 15px;
        }

        button{
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: darkcyan;
        }

        button:hover{
            background-color: #006464;
        }

        .button1{
            height: 30px;
            margin-top: 10px;
            border: none;
            border-radius: 3px;
            width: 95px;
        }

        .button2{
            height: 30px;
            margin-top: 10px;
            border: none;
            border-radius: 3px;
            width: 95px;
        }

        .button-detail{
            border: none;
            border-radius: 5px;
            padding: 6px;
            cursor: pointer;
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
    </style>
</head>
<body>
    <h1>Cari Pengaduan</h1>
    <nav class="box">
    <div class="cari">
    <form action="">
        <div>
            <input type="search" placeholder="search">
        </div>
        <div class="tombol">
            <button class="button1"><a href="">Cari</a></button>
            <button class="button2"><a href="admin.php">Kembali</a></button>
        </div>
    </form>
    </div>
    <div class="tabel">
        <table border="1" cellspacing='0' cellpadding='20'>
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>kategori</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>status</th>
                <th>feedback</th>
                <th>Detail</th>
            </tr>
            <?php $no = 1; ?>
            <?php while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nis'] ?></td>
                    <td><?= $data['ket_kategori'] ?></td>
                    <td><?= $data['lokasi'] ?></td>
                    <td><?= $data['ket'] ?></td>
                    <td><?= $data['status'] ?></td>
                    <td><?= $data['feedback'] ?></td>
                    <td><a href="?detail=<?= $data['id_pelapor'];?>"><button class="button-detail">Detail</button></a></td>
                </tr>
           <?php } ?>
        </table>
        <?php
            if(isset($_GET['detail'])){
                $id = $_GET['detail'];

                if(isset($_POST['simpan'])){
                $status = $_POST['status'];
                $feedback = $_POST['feedback'];
                mysqli_query($koneksi, "UPDATE input_aspirasi SET status='$status', feedback='$feedback'
                WHERE id_pelapor='$id'");
                header("Location: admin.php");
                exit;}

                $ambil = mysqli_query($koneksi, "SELECT input_aspirasi.*, kategori.ket_kategori FROM input_aspirasi LEFT JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori WHERE id_pelapor = '$id'");
                $detail = mysqli_fetch_array($ambil);
            ?>
                <div class="popup">
                    <div class="popup-detail">
                        <h3>DETAIL ASPIRASI</h3>
                        <form method="POST">
                                    <p><b>ID PELAPOR: </b><?= $detail['id_pelapor']; ?></p>
                                    <p><b>NIS: </b><?= $detail['nis']; ?></p>
                                    <p><b>KATEGORI: </b><?= $detail['ket_kategori']; ?></p>
                                    <p><b>LOKASI: </b><?= $detail['lokasi']; ?></p>
                                    <p><b>KETERANGAN: </b><?= $detail['ket']; ?></p>
                                    <p><b>STATUS: </b>
                                    <select name="status">
                                        <option value="proses" <?= $detail['status'] == 'proses' ? 'selected' : '' ?>>Proses</option>
                                        <option value="proses" <?= $detail['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                                    </select></p>
                                    <p><b>FEEDBACK ADMIN: </b>
                                    <br>
                                    <textarea name="feedback" rows="4" cols="40"><?= $detail['feedback'] ?></textarea>
                                </p>
                                <button class="button-detail" type="submit" name="simpan">Simpan Perubahan</button>
                                <a href="admin.php">kembali</a>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            <?php } ?>
    </div>
    </nav>
</body>
</html> 