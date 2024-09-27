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
    <title>Admin Jadwal Pelajaran</title>
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
        .btn-action {
            padding: 5px 10px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
        }
        .btn-add {
            display: inline-block;
            margin: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1 style="text-align: center;">Admin - Jadwal Pelajaran</h1>
        <!-- Tombol Kembali dan Tambah Data -->
        <div style="text-align: center; margin-bottom: 20px;">
        <a href="admin_panel.php" class="btn btn-home" style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Kembali ke Beranda</a>
            <a href="add_jadwal.php" class="btn-add">Tambah Jadwal</a>
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
                <th>Aksi</th>
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
                    echo "<td>";
                    echo "<a href='edit_jadwal.php?id=" . $row['id'] . "' class='btn-action btn-edit'>Edit</a>";
                    echo "<a href='delete_jadwal.php?id=" . $row['id'] . "' class='btn-action btn-delete' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                // Jika tidak ada data, tampilkan pesan
                echo "<tr><td colspan='6'>Tidak ada data jadwal pelajaran.</td></tr>";
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
