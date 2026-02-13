<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");
$sql = " SELECT * FROM `user` WHERE role = 'siswa'";
                if(isset($_GET['edit'])){
                $id = $_GET['edit'];

                if (isset($_POST['update'])) {  
                $username = $_POST['username'];
                $nis = $_POST['nis'];
                $kelas = $_POST['kelas'];

        mysqli_query($koneksi, "UPDATE user SET username='$username', nis='$nis', kelas='$kelas' WHERE id_user='$id'
    ");

    header("Location: data-siswa.php");
}


}

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

        .button-edit{
            border: none;
            border-radius: 5px;
            padding: 6px;
            cursor: pointer;
        }

        .button-edit-kembali{
            border: none;
            border-radius: 5px;
            padding: 6px;
            cursor: pointer;
            margin-top: 10px;
        }

        .aksi-siswa{
            display: flex;
            gap: 10px;
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

        .popup-edit{
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
        }

        .popup-edit h3{
            text-align: center;
        }

        .popup-edit input{
            width: 100%;
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
                <th>Nama</th>
                <th>Kelas</th>
                <th>aksi</th>
            </tr>
            <?php $no = 1; ?>
            <?php while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nis'] ?></td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['kelas'] ?></td>
                    <td class="aksi-siswa">
                        <a href="?edit=<?= $data['id_user'];?>"><button class="button-detail">Edit</button></a>
                        <a href="?detail=<?= $data['id_user'];?>"><button class="button-detail">Hapus</button></a>
                    </td>
                </tr>
           <?php } ?>
        </table>
        <?php
                if(isset($_GET['edit'])){
                $id = $_GET['edit'];

                $ambil = mysqli_query($koneksi, " SELECT * FROM `user` WHERE id_user = '$id'");
                $data = mysqli_fetch_array($ambil);
            ?>
                <div class="popup">
                    <div class="popup-edit">
                        <h3>Edit Siswa</h3>
                    <form method="post">
                        <label>Username</label><br>
                        <input type="text" name="username" value="<?= $data['username'] ?>"><br><br>

                        <label>NIS</label><br>
                        <input type="text" name="nis" value="<?= $data['nis'] ?>"><br><br>

                        <label>Kelas</label><br>
                        <input type="text" name="kelas" value="<?= $data['kelas'] ?>"><br><br>
                        <button class="button-edit" type="submit" name="update">Update</button>
                        <button class="button-edit-kembali"><a href="data-siswa.php">kembali</a></button>

                    </form>
                    </div>
                </div>
                <?php } ?>
    </div>
    </nav>
</body>
</html> 