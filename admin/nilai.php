<?php
include '../includes/db.php';

// Cek apakah form ditambahkan untuk menambahkan data baru
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_siswa = $_POST['nama_siswa'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $nilai_siswa = $_POST['nilai'];

    // Menambahkan nilai baru ke database
    $insertQuery = "INSERT INTO nilai (nama_siswa, mata_pelajaran, nilai) VALUES (?, ?, ?)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param("ssi", $nama_siswa, $mata_pelajaran, $nilai_siswa);
    $insertStmt->execute();
}

// Ambil data nilai dari database
$sql = "SELECT * FROM nilai";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Siswa</title>
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
            background-color: #343a40; /* Warna header tabel */
            color: #fff;
        }
        .btn-edit {
            background-color: #007bff; /* Warna tombol edit */
            color: #fff;
        }
        .btn-edit:hover {
            background-color: #0056b3; /* Efek hover untuk tombol edit */
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
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
    </style>
</head>
<body>
    <header class="text-center mb-4">
        <h1>Edit Nilai Siswa</h1>
    </header>
    <main>
        <div class="container">
            <div class="table-container">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Mata Pelajaran</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>".htmlspecialchars($row['nama_siswa'])."</td>
                                    <td>".htmlspecialchars($row['mata_pelajaran'])."</td>
                                    <td>".htmlspecialchars($row['nilai'])."</td>
                                    <td><a href='edit_nilai.php?id=".$row['id']."' class='btn btn-edit btn-sm'>Edit</a></td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>Tidak ada data nilai</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <!-- Form untuk menambahkan nilai baru -->
            <div class="form-container">
                <h4>Tambahkan Nilai Siswa</h4>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" id="nama_siswa" name="nama_siswa" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                        <input type="text" id="mata_pelajaran" name="mata_pelajaran" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="nilai" class="form-label">Nilai</label>
                        <input type="number" id="nilai" name="nilai" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Nilai</button>
                </form>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center mt-4">
                <a href="admin_panel.php" class="btn btn-secondary btn-home">Kembali ke Admin Panel</a>
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
