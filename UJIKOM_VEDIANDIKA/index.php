<?php session_start();?>

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
            transition: all 0.3s ease; 
        }

        .button1:hover{ 
            background-color: #b84b24;
            color: white;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .button2{ 
            background-color: cyan; 
            width: 200px; 
            height: 40px; 
            transition: all 0.3s ease;
        }

        .button2:hover{ 
            background-color: darkcyan;
            color: white;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .login-button{ 
            margin: 15px; 
            width: 70px; 
            height: 30px; 
        }

        .login-button:hover{ 
            background-color: gray; 
            color: white;
        }

        .akun-button{
            margin-right: auto;
            margin-top: 15px; 
            width: 70px; 
            height: 30px; 
        }

        .akun-button:hover{
            background-color: gray; 
            color:white;
        }
        
        .navbar span{
        margin-top: 20px;
        margin-right: 0;
        color: white;
        }

    </style>
</head>
<body>
        <div class="login">
            <!-- buat nampilin username di navbar halaman utama -->
            <?php if(isset($_SESSION['username'])): ?>
                <nav class="navbar">
                    <span>Hi, <?= htmlspecialchars($_SESSION['username']) ?></span>
                    <a href="akun/halaman-akun.php"><button class="akun-button">Akun</button></a>
                    <a href="login/logout/logout.php"><button class="login-button">Logout</button></a>
                </nav>
            <?php endif; ?> 
        </div>


    <div class="main-text">
        <h1>SELAMAT DATANG DI</h1>
        <h1>Website pengaduan MUTU</h1>
    </div>

    <div class="button">
        <!-- kalo belum login muncul perintah login dulu, setelah login baru bisa buat pengaduan -->
        <?php if(isset($_SESSION['username'])): ?>
            <button class="button1"><a href="pengaduan/halaman-pengaduan.php">Buat Pengaduan</a></button>
            <button class="button2"><a href="pengaduan/data-pengaduan.php">Data Pengaduan</a></button>
        <?php else: ?>
            <button class="button1"><a href="login/login.php">Login dulu yah</a></button>
        <?php endif; ?>
    </div>


</body>
</html>
