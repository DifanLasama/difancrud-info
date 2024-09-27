<?php
// Memasukkan file koneksi
include '../includes/db.php';

// Query untuk mengambil data jadwal pelajaran
$sql = "SELECT * FROM jadwal_pelajaran ORDER BY tanggal, jam_mulai";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelajaran</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Link ke file CSS (jika ada) -->
    <style>
        /* Tambahkan gaya CSS sederhana untuk tabel */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <h1 style="text-align: center;">Jadwal Pelajaran</h1>
        <!-- Tombol Kembali -->
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="../index.php" class="btn btn-home" style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Kembali ke Beranda</a>
        </div>
    </header>
    <main>
        <table>
            <tr>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
            </tr>
            <?php
            // Jika ada data yang ditemukan
            if ($result->num_rows > 0) {
                // Looping melalui hasil query
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['hari'] . "</td>";
                    echo "<td>" . date('d/m/Y', strtotime($row['tanggal'])) . "</td>"; // Format tanggal ke d/m/Y
                    echo "<td>" . date('H:i', strtotime($row['jam_mulai'])) . " - " . date('H:i', strtotime($row['jam_selesai'])) . "</td>";
                    echo "<td>" . htmlspecialchars($row['mata_pelajaran']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['guru']) . "</td>";
                    echo "</tr>";
                }
            } else {
                // Jika tidak ada data, tampilkan pesan
                echo "<tr><td colspan='5'>Tidak ada data jadwal pelajaran.</td></tr>";
            }
            ?>
        </table>
    </main>
</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
