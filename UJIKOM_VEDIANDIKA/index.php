<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            padding: 0;
        }

        .navbar{
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: rgb(0, 0, 0, 0.3);
            justify-content: end;
        }

        .main-text{
            justify-content: center;
            align-items: center;
            margin-top: 300px;
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

        .login-button{
            margin: 15px;
            width: 70px;
            height: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
    <div class="login">
        <a href="admin/login.php"><button class="login-button">
            Login
        </button></a>
    </div>
    </nav>

    <div class="main-text">
        <h1>SELAMAT DATANG DI</h1>
        <h1>Website pengaduan MUTU</h1>
    </div>

    <div class="button">
        <button class="button1"><a href="halaman-pengaduan.php">Buat Pengaduan</a></button>
        <button class="button2"><a href="cari-pengaduan.php">Cari Pengaduan</a></button>
    </div>
</body>
</html>