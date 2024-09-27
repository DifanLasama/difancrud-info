<?php
// Memasukkan file koneksi
include '../includes/db.php';

// Cek jika ID disertakan dalam URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: admin_jadwal.php"); // Arahkan kembali jika tidak ada ID
    exit();
}

$id = $_GET['id'];

// Proses penghapusan data
$sql = "DELETE FROM jadwal_pelajaran WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: admin_jadwal.php"); // Arahkan kembali ke halaman admin
    exit();
} else {
    echo "Gagal menghapus data: " . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
