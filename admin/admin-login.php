<?php
session_start(); // Memulai session

// Ubah jalur sesuai dengan struktur direktori Anda
include '../includes/db.php'; // Atur path ke file db.php dengan benar

$error = ""; // Variabel untuk pesan error

// Memeriksa jika form login dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Periksa metode request
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah pengguna ada di database
    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa hasil query
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verifikasi password tanpa hash
        if ($password == $row['password']) { // Bandingkan langsung password tanpa hash
            // Menyimpan informasi login di session
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: admin_panel.php');
            exit;
        } else {
            $error = "Kata sandi salah. Silakan coba lagi.";
        }
    } else {
        $error = "Nama pengguna tidak ditemukan. Silakan coba lagi.";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* CSS untuk halaman login admin */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #6e45e2 0%, #88d3ce 100%);
            font-family: Arial, sans-serif;
        }
        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-weight: bold;
        }
        .login-container input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .login-container button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        /* Ikon di belakang judul */
        .login-container::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            width: 60px;
            height: 60px;
            background: url('https://cdn-icons-png.flaticon.com/512/271/271228.png') no-repeat center center;
            background-size: contain;
            opacity: 0.1;
            z-index: 0; /* Pastikan berada di belakang konten lainnya */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Admin</h2>
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="admin-login.php" method="POST">
            <input type="text" name="username" placeholder="Nama Pengguna" required>
            <input type="password" name="password" placeholder="Kata Sandi" required>
            <button type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>
            