<?php
session_start();
if(!isset($_SESSION['role'])){
    header("Location: ../../login/login.php");
    exit;
}

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");
$sql = " SELECT * FROM `kategori`";


if (isset($_GET["hapus"])) {
    $id = $_GET["hapus"];

    mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");

    header("Location: data-kategori.php?status=hapus");
    exit;
} 
                if(isset($_GET['edit'])){
                $id = $_GET['edit'];

                if (isset($_POST['update'])) { 
                $kategori = $_POST['ket_kategori'];

        mysqli_query($koneksi, "UPDATE kategori SET ket_kategori='$kategori' WHERE id_kategori='$id'
    ");
}
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
        }

        .judul {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        h1{
            text-align: center;  
        }

        .box{
            justify-content: center;
            align-items: center;
            border: 1px solid;
            border-radius: 6px;
        }

        .tabel{
            margin-top: 10px;
            padding: 20px 60px;
        }

        table{
            width: 100%;
        }

        tr{
            text-align: center;
        }

        tr td{
            justify-content: center;
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
        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .popup-data-kategori {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
        }

        .popup-data-kategori a {
            display: inline-block;
            margin: 10px;
            padding: 8px 20px;
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
                /* Container DataTables */
        .dataTables_wrapper {
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }

        /* Search Box */
        .dataTables_filter {
            margin-bottom: 15px;
        }

        .dataTables_filter label {
            font-weight: bold;
        }

        .dataTables_filter input {
            padding: 8px 12px;
            border-radius: 20px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.3s;
            width: 220px;
        }


        /* Dropdown jumlah data */
        .dataTables_length select {
            padding: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        /* Pagination */
        .dataTables_paginate .paginate_button {
            padding: 5px 10px !important;
            margin: 2px;
            border-radius: 6px !important;
        }

        .dataTables_paginate .paginate_button.current {
            background: darkcyan !important;
            color: white !important;
            border: none !important;
        }
    </style>

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
            <h1>Data Siswa</h1>
        </div>
    </nav>
    <nav class="box">
    <div class="tabel">
        <table id="datatable" border="1" cellspacing='0' cellpadding='20'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Kategori</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
                <tbody>
            <?php $no = 1; ?>
            <?php while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['id_kategori'] ?></td>
                    <td><?= $data['ket_kategori'] ?></td>
                    <td class="aksi-siswa">
                        <a href="?edit=<?= $data['id_kategori'];?>"><button class="button-detail">Edit</button></a>
                        <a href="?konfirmasi=<?php echo $data['id_kategori']; ?>"><button class="button-detail">Hapus</button></a>

                    </td>
                </tr>
                <?php } ?>
                </tbody>

        </table>
        <?php
                if(isset($_GET['edit'])){
                $id = $_GET['edit'];

                $ambil = mysqli_query($koneksi, " SELECT * FROM `kategori` WHERE id_kategori = '$id'");
                $data = mysqli_fetch_array($ambil);
            ?>
                <div class="popup">
                    <div class="popup-edit">
                        <h3>Edit Siswa</h3>
                    <form method="post">
                        <label>Nama Kategori</label><br>
                        <input type="text" name="ket_kategori" value="<?= $data['ket_kategori'] ?>"><br><br>

                        <button class="button-edit" type="submit" name="update">Update</button>
                        <button class="button-edit-kembali"><a href="data-kategori.php">kembali</a></button>

                    </form>
                    </div>
                </div>
                <?php } ?>
    </div>
    </nav>

<?php if (isset($_GET['konfirmasi'])): ?>
    <div class="popup">
        <div class="popup-data-kategori">
            <h2>Konfirmasi</h2>
            <p>Yakin ingin menghapus akun ini?</p>

            <a href="?hapus=<?php echo $_GET['konfirmasi']; ?>">Ya</a>
            <a href="data-kategori.php">Batal</a>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($_GET['status']) && $_GET['status'] == 'hapus'): ?>
    <div class="popup">
        <div class="popup-data-kategori">
            <h2>Berhasil</h2>
            <p>Akun berhasil dihapus</p>
            <a href="data-kategori.php">OK</a>
        </div>
    </div>
<?php endif; ?>

<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        "language": {
            "search": "Cari:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "paginate": {
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        }
    });
});
</script>
</body>
</html> 