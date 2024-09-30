<?php
// Memasukkan file koneksi
include '../includes/db.php';

// Query untuk mengambil data jadwal pelajaran dan mengurutkan berdasarkan hari
$sql = "SELECT * FROM jadwal_pelajaran ORDER BY FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'), tanggal, jam_mulai";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Jadwal Pelajaran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9f5e9; /* Warna latar belakang hijau muda */
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .table-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .table thead th {
            background-color: #2c6e49; /* Warna hijau gelap untuk header tabel */
            color: #fff;
        }
        .btn-home {
            background-color: #007bff; /* Warna biru untuk tombol kembali */
            color: white; 
            border-radius: 20px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }
        .btn-home:hover {
            background-color: #0056b3; /* Efek hover untuk tombol kembali */
        }
        .btn-action {
            padding: 5px 10px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-edit {
            background-color: #4CAF50; /* Warna hijau untuk tombol edit */
            color: white;
        }
        .btn-edit:hover {
            background-color: #45a049; /* Efek hover untuk tombol edit */
        }
        .btn-delete {
            background-color: #f44336; /* Warna merah untuk tombol hapus */
            color: white;
        }
        .btn-delete:hover {
            background-color: #d32f2f; /* Efek hover untuk tombol hapus */
        }
        .btn-add {
            display: inline-block;
            margin: 20px;
            background-color: #007bff; /* Warna biru untuk tombol tambah */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-add:hover {
            background-color: #0056b3; /* Efek hover untuk tombol tambah */
        }
    </style>
</head>
<body>
    <header class="text-center mb-4">
        <h1>Admin - Jadwal Pelajaran</h1>
    </header>
    <main>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Jika ada data yang ditemukan
                if ($result->num_rows > 0) {
                    // Looping melalui hasil query
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['hari']) . "</td>";
                        echo "<td>" . date('d/m/Y', strtotime($row['tanggal'])) . "</td>"; // Format tanggal ke d/m/Y
                        echo "<td>" . date('H:i', strtotime($row['jam_mulai'])) . " - " . date('H:i', strtotime($row['jam_selesai'])) . "</td>";
                        echo "<td>" . htmlspecialchars($row['mata_pelajaran']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['guru']) . "</td>";
                        echo "<td>";
                        echo "<a href='edit_jadwal.php?id=" . $row['id'] . "' class='btn-action btn-edit'>Edit</a>";
                        echo "<a href='delete_jadwal.php?id=" . $row['id'] . "' class='btn-action btn-delete' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Jika tidak ada data, tampilkan pesan
                    echo "<tr><td colspan='6' class='text-center'>Tidak ada data jadwal pelajaran.</td></tr>";
                }
                ?>
                </tbody>
            </table>
            <div class="text-center mt-4">
                <a href="admin_panel.php" class="btn btn-home">Kembali ke Beranda</a>
                <a href="add_jadwal.php" class="btn-add">Tambah Jadwal</a>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS (for responsive table and additional functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
