<?php session_start(); ?>

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
            display: flex; 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 60px; 
            background-color: rgba(0,0,0,0.3); 
            justify-content: end; 
        }

        .main-text{ 
            justify-content: center; 
            align-items: center; 
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
            cursor: pointer; 
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

        .button1:hover{ 
            background-color: #b84b24; 
        }

        .button2{ 
            background-color: cyan; 
            width: 200px; 
            height: 40px; 
        }

        .button2:hover{ 
            background-color: darkcyan; 
        }

        .login-button{ 
            margin: 15px; 
            width: 70px; 
            height: 30px; 
        }

        .login-button:hover{ 
            background-color: gray; 
        }

        .menu-tambahan{
            background: sandybrown;
            border-radius: 5px;
            padding: 15px;
        }

        .menu-tambahan:hover{
            background-color: chocolate;
        }

        .menu-tambahan summary{
            cursor: pointer;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }



        .menu{
            gap: 15px;
            margin-top: 20px;
        }

        .menu-item{
            background: white;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
        }

        .menu-item:hover{
            background-color: gray;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="login">
            <?php (isset($_SESSION['username'])) ?>
                <span style="color:white; margin-right:10px;">Hi, <?= htmlspecialchars($_SESSION['role']) ?></span>
                <a href="logout-admin.php"><button class="login-button">Logout</button></a>
        </div>
    </nav>

    <div class="main-text">
        <h1>SELAMAT DATANG DI</h1>
        <h1>Website pengaduan MUTU</h1>
    </div>
    
    <!-- sama ajah kaya index tapi inih buat atmin -->
    <div class="button">
        <?php if(isset($_SESSION['username'])): ?>
            <button class="button1"><a href="form-siswa.php">Form Siswa</a></button>
        <?php endif; ?>
        <button class="button2"><a href="kategori.php">Tambah kategori</a></button>
    </div>

    <details class="menu-tambahan">
        <summary>Menu Lainnya</summary>
            <div class="menu">
                <a href="data-siswa.php" class="menu-item">Profil siswa</a>
                <a href="data-pengaduan.php" class="menu-item">List Aspirasi</a>
                <a href="laporan.php" class="menu-item">Halaman Kategori</a>
            </div>
    </details>
</body>
</html>
