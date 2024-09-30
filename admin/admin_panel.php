<?php
// session_start(); 
// Uncomment session_start() jika autentikasi menggunakan session, pastikan sudah ada validasi login.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1d2b64 0%, #f8cdda 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
            position: relative;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 26px;
            color: #333333;
            font-weight: bold;
        }
        p {
            font-size: 16px;
            color: #666666;
            margin-bottom: 30px;
        }
        .btn-custom {
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 50px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-edit-jadwal {
            background-color: #007bff;
            color: #fff;
        }
        .btn-edit-jadwal:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }
        .btn-edit-nilai {
            background-color: #28a745;
            color: #fff;
        }
        .btn-edit-nilai:hover {
            background-color: #218838;
            transform: translateY(-3px);
        }
        .btn-logout {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-logout:hover {
            background-color: #c82333;
            transform: translateY(-3px);
        }
        .icon {
            font-size: 50px;
            color: #007bff;
            margin-bottom: 20px;
        }
        /* Decorative borders around the container */
        .container::before,
        .container::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: -1;
            border: 3px solid transparent;
            border-radius: 12px;
            background: linear-gradient(90deg, #6e45e2, #88d3ce) border-box;
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            background-clip: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">
            <i class="fas fa-user-cog"></i>
        </div>
        <h2>Selamat Datang di Halaman Admin</h2>
        <p>Silakan pilih halaman yang ingin Anda akses:</p>
        <div class="d-grid gap-3">
            <a href="admin_jadwal.php" class="btn btn-edit-jadwal btn-custom"><i class="fas fa-calendar-alt"></i> Edit Jadwal</a>
            <a href="edit_nilai.php" class="btn btn-edit-nilai btn-custom"><i class="fas fa-clipboard-list"></i> Edit Nilai</a>
            <a href="admin-login.php" class="btn btn-logout btn-custom"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

    <!-- Bootstrap JS (for responsive buttons and additional functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
