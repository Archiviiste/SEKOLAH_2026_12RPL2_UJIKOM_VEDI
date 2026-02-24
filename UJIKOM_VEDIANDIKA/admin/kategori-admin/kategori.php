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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
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
            width: 310px;
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
            border: none;
        }

        .judul {
            position: absolute;
            left: 50%;
            transform: translateX(-60%);
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


        .popup-kategori {
            background: white;
            padding: 30px;
            border-radius: 8px;
            width: 350px;
            text-align: center;
        }


        .popup-kategori {
            background: white;
            padding: 30px;
            border-radius: 8px;
            width: 350px;
            text-align: center;
        }

        .popup-kategori a {
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
            <a href="../admin.php">
                <button>Halaman Utama</button>
            </a>
        </div>

        <div class="judul">
            <h1>Form Kategori</h1>
        </div>
    </nav>

    <nav class="box">
    <form action="proses-kategori.php" method="post">
        <div>
            <label for="">kategori</label>
            <input  type="text" name="ket">
        </div>

        <div>
        <button class="button1" name="action" value="kirim">KIRIM</button> 
        </div>
    </form>
        <!-- sama aja kaya pop up yang di halaman pengaduan bedanya inih buwat atmin -->
        <?php if ($success): ?>
        <div class="popup">
            <div class="popup-kategori">
                <h2>Berhasil</h2>
                <p>Kategori berhasil ditambahkan</p>
                <a href="kategori.php">OK</a>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>