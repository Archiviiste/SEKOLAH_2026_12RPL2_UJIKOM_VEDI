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
            padding: 0;
            margin: 0;
        }

        .navbar{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: rgb(0, 0, 0, 0.3);

        }

        h1{
            margin-top: 180px;
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



        .tombol{
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        button{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .button1{
            height: 30px;
            margin-top: 10px;
            border: none;
            border-radius: 3px;
            width: 150px;
            background-color: darkcyan;
        }

        .home-button{
            border-radius: 3px;
            border: none;
            margin: 15px;
            width: 100px;
            height: 30px;
        }


        a{
            text-decoration: none;
            color:inherit;
        }

        option{
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <nav class="navbar">
        <a href="index.php"><button class="home-button">
            Halaman Utama
        </button></a>
    </nav>
    <h1>Halaman Pengaduan</h1>
    <nav class="box">
    <form action="proses.php" method="post">
        <div>
            <label for="">NIS</label>
            <br>
            <input type="text" name="nis" required>
        </div>
        <div>
            <label for="kategori">Kategori</label>
            <br>
            <select id="kategori" name="kategori" required>
                <option value="" selected hidden>Pilih Kategori</option>
                <option value="fasilitas">Fasilitas</option>
                <option value="kebersihan">Kebersihan</option>
                <option value="1">Elektronik</option>
                <option value="pelayanan">Pelayanan</option>
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
</body>
</html>