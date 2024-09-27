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
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333333;
        }
        .btn-custom {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-edit-jadwal {
            background-color: #007bff;
            color: #fff;
        }
        .btn-edit-jadwal:hover {
            background-color: #0056b3;
        }
        .btn-edit-nilai {
            background-color: #28a745;
            color: #fff;
        }
        .btn-edit-nilai:hover {
            background-color: #218838;
        }
        .btn-logout {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Selamat Datang di Panel Admin</h2>
        <p>Silakan pilih halaman yang ingin Anda akses:</p>
        <div class="d-grid gap-3">
            <a href="admin_jadwal.php" class="btn btn-edit-jadwal btn-custom">Edit Jadwal</a>
            <a href="edit_nilai.php" class="btn btn-edit-nilai btn-custom">Edit Nilai</a>
            <a href="admin-login.php" class="btn btn-logout btn-custom">Logout</a>
        </div>
    </div>

    <!-- Bootstrap JS (for responsive buttons and additional functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
