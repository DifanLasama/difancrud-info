<?php
include '../includes/db.php';

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
            background-color: #f8f9fa;
            padding: 20px;
        }
        .table-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .table thead th {
            background-color: #343a40;
            color: #fff;
        }
        .btn-edit {
            background-color: #007bff;
            color: #fff;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">Nilai Siswa Kelas TKJ</h2>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai</th>
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
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>Tidak ada data nilai</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tombol Kembali -->
        <div class="text-start mt-4">
    <a href="../index.php" class="btn btn-home btn-sm" style="background-color: #007bff; color: white; border-radius: 20px; padding: 10px 20px; transition: background-color 0.3s;">
        Kembali ke Beranda
    </a>
</div>

    </div>

    <!-- Bootstrap JS (for responsive table and additional functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
