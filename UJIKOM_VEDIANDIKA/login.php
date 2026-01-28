<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { 
            box-sizing: border-box; 
            font-family: 'Quicksand', sans-serif; 
        }

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: wheat;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            padding: 40px;
            border-radius: 12px;
            width: 350px;
            text-align: center;
            border: 1px solid black;
        }

        h2 {
            margin-bottom: 30px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-button {
            background-color: darkcyan;
            color: white;
            margin-bottom: 10px;
        }

        .login-button:hover {
            background-color: #067d83;
        }

        .back-button {
            background-color: gray;
            color: white;
        }

        .back-button:hover {
            background-color: #555;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <!--  buat ngasih tawu errornya apah di halaman login -->
        <?php if(isset($_GET['error'])): ?>
        <p class="error"><?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>

        <form action="proses-login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="login-button">Login</button>
        </form>

        <a href="index.php"><button class="back-button">Kembali</button></a>
    </div>
</body>
</html>