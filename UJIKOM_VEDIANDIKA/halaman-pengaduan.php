<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1{
          text-align: center;  
        }

        .box{
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid;
            border-radius: 6px;
            padding: 40px;
        }

        input{
            width: 200px;
        }

        textarea{
            width: 200px;
            height: 50px;
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
            background-color: darkcyan;
        }

        .button1{
            height: 30px;
            margin-top: 10px;
            border: none;
            border-radius: 3px;
            width: 95px;
        }

        .button2{
            margin-top: 10px;
            border: none;
            border-radius: 3px;
            width: 95px;
        }


        a{
            text-decoration: none;
            color:inherit;
        }
    </style>
</head>
<body>
    <h1>Halaman Pengaduan</h1>
    <nav class="box">
    <form action="">
        <div>
            <label for="">NIS</label>
            <br>
            <input type="text">
        </div>
        <div>
            <label for="">kategori</label>
            <br>
            <input type="text">
        </div>
        <div>
            <label for="">Lokasi</label>
            <br>
            <input type="text">
        </div>
        <div>
            <label for="">Keterangan</label>
            <br>
            <textarea></textarea>
        </div>
        <div class="tombol">
        <button class="button1"><a href="">Kirim</a></button>
        <button class="button2"><a href="index.php">Kembali</a></button>
        </div>
    </form>
    </nav>
</body>
</html>
