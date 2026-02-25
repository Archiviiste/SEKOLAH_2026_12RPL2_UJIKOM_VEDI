<?php
session_start();
if(!isset($_SESSION['nis'])){
    header("Location: ../../login/login.php");
    exit;
}
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");
            
if(isset($_GET['detail'])){ 
$id = $_GET['detail'];
if(isset($_POST['simpan'])){
 $status = $_POST['status'];
$feedback = $_POST['feedback'];
mysqli_query($koneksi, "UPDATE input_aspirasi SET status='$status', feedback='$feedback'
WHERE id_pelapor='$id'");
header("Location: data-pengaduan.php");
exit();}

}
$sql = "SELECT input_aspirasi.*, kategori.ket_kategori, user.username FROM input_aspirasi LEFT JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori LEFT JOIN user ON input_aspirasi.nis = user.nis";

if(isset($_GET['tanggal']) && $_GET['tanggal'] != ''){
    $tanggal = $_GET['tanggal'];
    $sql .= " WHERE input_aspirasi.waktu LIKE '$tanggal%'";
}
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
            min-height: 100vh;
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

        .home-button{
            width: 100px;
        }

        .home-button button{
            background-color: white;
        }

        .home-button button:hover{
            background-color: gray;
        }

        .home-button button {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            height: 40px;
            border: none;
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
            justify-content: center;
            align-items: center;
            border: 1px solid;
            border-radius: 6px;
            padding: 32px;
            margin-top: 80px;
        }

        .tabel{
            margin-top: 10px;
        }

        tr{
            text-align: center;
        }

        tr td{
            justify-content: center;
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

        .button-detail-kembali{
            border: none;
            border-radius: 5px;
            padding: 6px;
            cursor: pointer;
            margin-top: 10px;
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

        .filter-waktu {
            margin-bottom: 10px;
        }

        .filter-waktu form {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-waktu input {
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            width: 200px;
        }

        .filter-waktu input:focus {
            border-color: darkcyan;
            outline: none;
        }

        .filter-waktu button {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            background: darkcyan;
            color: white;
            cursor: pointer;
        }

        .filter-waktu button:hover {
            background: #006464;
        }
</style>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

</head>
<body>
    <nav class="navbar">
        <div class="home-button">
            <a href="../admin.php">
                <button>Halaman Utama</button>
            </a>
        </div>

        <div class="judul">
            <h1>Data Aspirasi</h1>
        </div>
    </nav>
    <nav class="box">
    <div class="filter-waktu">
    <form method="GET">
    <input type="date" name="tanggal">
    <button type="submit">Filter</button>
    </form>
    </div>
    <div class="tabel">

<table id="datatable" border="1" cellspacing='0' cellpadding='20'>
    <thead>
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>kategori</th>
            <th>Lokasi</th>
            <th>Keterangan</th>
            <th>status</th>
            <th>feedback</th>
            <th>waktu</th>
            <th>Detail</th>
        </tr>
    </thead>

    <tbody> 
        <?php $no = 1; ?>
        <?php while($data = mysqli_fetch_array($query)){ ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nis'] ?></td>
                <td><?= $data['username'] ?></td>
                <td><?= $data['ket_kategori'] ?></td>
                <td><?= $data['lokasi'] ?></td>
                <td><?= $data['ket'] ?></td>
                <td><?= $data['status'] ?></td>
                <td><?= $data['feedback'] ?></td>
                <td><?= date('d M Y', strtotime($data['waktu'])) ?></td>
                <td>
                    <a href="?detail=<?= $data['id_pelapor'];?>">
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
                $ambil = mysqli_query($koneksi, "
                    SELECT input_aspirasi.*, kategori.ket_kategori, user.username FROM input_aspirasi LEFT JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori LEFT JOIN user ON input_aspirasi.nis = user.nis
                    WHERE id_pelapor = '$id'");

                $detail = mysqli_fetch_array($ambil);
            ?>
                <div class="popup">
                    <div class="popup-detail">
                        <h3>DETAIL ASPIRASI</h3>
                        <form method="POST">
                                    <p><b>ID PELAPOR: </b><?= $detail['id_pelapor']; ?></p>
                                    <p><b>NIS: </b><?= $detail['nis']; ?></p>
                                    <p><b>NAMA PELAPOR: </b><?= $detail['username']; ?></p>
                                    <p><b>KATEGORI: </b><?= $detail['ket_kategori']; ?></p>
                                    <p><b>LOKASI: </b><?= $detail['lokasi']; ?></p>
                                    <p><b>KETERANGAN: </b><?= $detail['ket']; ?></p>
                                    <p><b>WAKTU :</b><?= $detail['waktu'] ?></p>
                                    <p><b>STATUS: </b>
                                    <select name="status">
                                        <option value="proses" <?= $detail['status'] == 'proses' ? 'selected' : '' ?>>Proses</option>
                                        <option value="selesai" <?= $detail['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                                    </select></p>
                                    <p><b>FEEDBACK ADMIN: </b>
                                    <br>
                                    <textarea name="feedback" rows="4" cols="40"><?= $detail['feedback'] ?></textarea>
                                </p>
                                <button class="button-detail" type="submit" name="simpan">Simpan Perubahan</button>
                                <button class="button-detail-kembali"><a href="data-pengaduan.php">kembali</a></button>
                                
                        </form>
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