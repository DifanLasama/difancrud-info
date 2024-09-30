<?php
include '../includes/db.php';

// Cek apakah parameter ID sudah dikirimkan melalui URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: nilai.php"); // Kembali ke halaman nilai jika tidak ada ID
    exit();
}

$id = intval($_GET['id']);

// Ambil data nilai berdasarkan ID
$query = "SELECT * FROM nilai WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$nilai = $result->fetch_assoc();

if (!$nilai) {
    header("Location: nilai.php"); // Kembali jika data tidak ditemukan
    exit();
}

// Proses pembaruan data nilai
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_siswa = $_POST['nama_siswa'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $nilai_siswa = $_POST['nilai'];

    // Update nilai di database
    $updateQuery = "UPDATE nilai SET nama_siswa = ?, mata_pelajaran = ?, nilai = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("ssii", $nama_siswa, $mata_pelajaran, $nilai_siswa, $id);
    $updateStmt->execute();

    // Redirect ke halaman nilai setelah pembaruan
    header("Location: nilai.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nilai</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nilai Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc; /* Warna latar belakang yang lebih lembut */
            padding: 20px;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Efek bayangan */
            max-width: 600px;
            margin: auto;
            transition: transform 0.3s ease;
        }
        .form-container:hover {
            transform: translateY(-5px); /* Efek hover untuk form */
        }
        h2 {
            color: #333;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .form-label {
            color: #495057;
            font-size: 1rem;
            font-weight: 600;
        }
        .form-control {
            border-radius: 8px;
            padding: 10px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #6c757d;
        }
        .form-control, .btn {
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }
            .btn-primary, .btn-secondary {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">Edit Nilai Siswa</h2>
        <div class="form-container">
            <form action="edit_nilai.php?id=<?php echo $id; ?>" method="POST">
                <div class="mb-3">
                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                    <input type="text" id="nama_siswa" name="nama_siswa" class="form-control" value="<?php echo htmlspecialchars($nilai['nama_siswa']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                    <input type="text" id="mata_pelajaran" name="mata_pelajaran" class="form-control" value="<?php echo htmlspecialchars($nilai['mata_pelajaran']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nilai" class="form-label">Nilai</label>
                    <input type="number" id="nilai" name="nilai" class="form-control" value="<?php echo htmlspecialchars($nilai['nilai']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                <a href="nilai.php" class="btn btn-secondary w-100">Kembali</a>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

