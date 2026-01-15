<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .button{
            display: flex;
            justify-content: center;
        }

        button{
            border: none;
            border-radius: 4px;
            margin: 30px;
        }
        
        a{
            text-decoration: none;
            color:inherit;
        }
        
        .button1{
            background-color: coral;           
            width: 200px;
            height: 40px;
        }

        .button2{
            background-color: cyan;
            width: 200px;
            height: 40px;
        }
    </style>
</head>
<body>
    <h1>SELAMAT DATANG DI</h1>
    <h1>Website pengaduan MUTU</h1>

    <div class="button">
        <button class="button1"><a href="halaman-pengaduan.php">Buat Pengaduan</a></button>
        <button class="button2"><a href="cari-pengaduan.php">Cari Pengaduan</a></button>
    </div>
</body>
</html>
