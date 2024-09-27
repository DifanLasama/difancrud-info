<?php
// Memasukkan file koneksi
include '../includes/db.php';

// Proses penambahan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam_mulai = date('H:i', strtotime($_POST['jam_mulai']));
    $jam_selesai = date('H:i', strtotime($_POST['jam_selesai']));
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $guru = $_POST['guru'];

    $sql = "INSERT INTO jadwal_pelajaran (hari, tanggal, jam_mulai, jam_selesai, mata_pelajaran, guru) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $hari, $tanggal, $jam_mulai, $jam_selesai, $mata_pelajaran, $guru);

    if ($stmt->execute()) {
        header("Location: admin_jadwal.php"); // Arahkan kembali ke halaman admin
        exit();
    } else {
        echo "Gagal menambahkan data: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Pelajaran</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Link ke file CSS (jika ada) -->
    <style>
        form {
            width: 60%;
            margin: 20px auto;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="date"], input[type="time"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1 style="text-align: center;">Tambah Jadwal Pelajaran</h1>
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="admin_jadwal.php" class="btn btn-home" style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Kembali ke Halaman Admin</a>
        </div>
    </header>
    <main>
        <form action="add_jadwal.php" method="POST">
            <label for="hari">Hari:</label>
            <input type="text" id="hari" name="hari" required>

            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <label for="jam_mulai">Jam Mulai:</label>
            <input type="time" id="jam_mulai" name="jam_mulai" required>

            <label for="jam_selesai">Jam Selesai:</label>
            <input type="time" id="jam_selesai" name="jam_selesai" required>

            <label for="mata_pelajaran">Mata Pelajaran:</label>
            <input type="text" id="mata_pelajaran" name="mata_pelajaran" required>

            <label for="guru">Guru:</label>
            <input type="text" id="guru" name="guru" required>

            <button type="submit">Tambah Jadwal</button>
        </form>
    </main>
</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
