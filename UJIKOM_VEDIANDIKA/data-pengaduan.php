<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");
$sql = "SELECT * FROM `input_aspirasi`";
$query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data pengaduan</title>
</head>
<body>
    <h2>Data Pengaduan</h2>

    <table border="1">
        <tr>
            <th>No</th>
            <th>lokasi</th>
            <th>keterangan</th>
            <th>status</th>
        </tr>
    </table>
</body>
</html>