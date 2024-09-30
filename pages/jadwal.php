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
    <title>Jadwal Pelajaran</title>
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
            background-color: #4CAF50; /* Warna hijau untuk tombol kembali */
            color: white; 
            border-radius: 20px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }
        .btn-home:hover {
            background-color: #45a049; /* Efek hover untuk tombol kembali */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">Jadwal Pelajaran</h2>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
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
                        echo "</tr>";
                    }
                } else {
                    // Jika tidak ada data, tampilkan pesan
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data jadwal pelajaran.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tombol Kembali -->
        <div class="text-start mt-4">
            <a href="../index.php" class="btn btn-home btn-sm">
                Kembali ke Beranda
            </a>
        </div>
        
    </div>

    <!-- Bootstrap JS (for responsive table and additional functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
