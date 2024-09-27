<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.html");
    exit();
}

// Mengambil data dari database untuk ditampilkan dalam formulir
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sis_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = [];
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM schedule WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Edit Data</h1>
    </header>
    <main>
        <form action="process-edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
            
            <label for="subject">Mata Pelajaran:</label>
            <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($data['subject']); ?>" required>
            
            <label for="teacher">Guru:</label>
            <input type="text" id="teacher" name="teacher" value="<?php echo htmlspecialchars($data['teacher']); ?>" required>
            
            <label for="day">Hari:</label>
            <input type="text" id="day" name="day" value="<?php echo htmlspecialchars($data['day']); ?>" required>
            
            <label for="time">Jam:</label>
            <input type="text" id="time" name="time" value="<?php echo htmlspecialchars($data['time']); ?>" required>
            
            <button type="submit">Update Data</button>
        </form>
    </main>
</body>
</html>
