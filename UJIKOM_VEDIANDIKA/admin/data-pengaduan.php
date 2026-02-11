<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");
$sql = "SELECT * FROM `input_aspirasi`";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .table-container{
            width: 90%;
            margin: 50px auto;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        th{
            background: darkcyan;
            color: white;
            padding: 12px;
            text-align: center;
        }

        td{
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:hover{
            background: #f2f2f2;
        }

        .status-proses{
            color: orange;
            font-weight: bold;
        }

        .status-selesai{
            color: green;
            font-weight: bold;
        }

        .status-ditolak{
            color: red;
            font-weight: bold;
        }

    </style>
</head>
<body>

<div class="table-container">
    <table>
        <tr>
            <th>No</th>
            <th>Lokasi</th>
            <th>Keterangan</th>
            <th>Status</th>
        </tr>

        <?php 
        $no = 1;
        while($data = mysqli_fetch_array($query)){ 
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['lokasi']; ?></td>
            <td><?= $data['ket']; ?></td>
            <td>
                <?php 
                if($data['status'] == 'menunggu'){
                    echo "<span class='status-proses'>Proses</span>";
                } elseif($data['status'] == 'proses'){
                    echo "<span class='status-selesai'>Selesai</span>";
                } else {
                    echo "<span class='status-ditolak'>Ditolak</span>";
                }
                ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
