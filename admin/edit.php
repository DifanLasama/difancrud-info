    <?php
    // Memasukkan file koneksi
    include '../includes/db.php';

    // Cek jika ID disertakan dalam URL
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: admin_dashboard.php"); // Arahkan kembali jika tidak ada ID
        exit();
    }

    $id = intval($_GET['id']);

    // Ambil data dari database
    $query = "SELECT * FROM jadwal_pelajaran WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $jadwal = $result->fetch_assoc();

    if (!$jadwal) {
        header("Location: admin_dashboard.php"); // Arahkan kembali jika data tidak ditemukan
        exit();
    }

    // Proses pembaruan data (tempelkan kode ini di sini)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $hari = $_POST['hari'];
        $tanggal = $_POST['tanggal'];
        $jam_mulai = date('H:i', strtotime($_POST['jam_mulai']));
        $jam_selesai = date('H:i', strtotime($_POST['jam_selesai']));
        $mata_pelajaran_id = $_POST['mata_pelajaran_id'];
        $guru_id = $_POST['guru_id'];

        $updateQuery = "UPDATE jadwal_pelajaran SET hari = ?, tanggal = ?, jam_mulai = ?, jam_selesai = ?, mata_pelajaran_id = ?, guru_id = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("sssiiii", $hari, $tanggal, $jam_mulai, $jam_selesai, $mata_pelajaran_id, $guru_id, $id);
        
        if ($updateStmt->execute()) {
            if ($updateStmt->affected_rows > 0) {
                echo "Data berhasil diperbarui.<br>";
            } else {
                echo "Tidak ada perubahan yang dilakukan. Pastikan data yang diubah valid.<br>";
            }
        } else {
            echo "Gagal memperbarui data: " . $conn->error;
        }

        // Redireksi setelah pembaruan
        header("Location: admin_dashboard.php");
        exit();
    }

    // Ambil daftar mata pelajaran dan guru untuk pilihan
    $mata_pelajaran_query = "SELECT * FROM mata_pelajaran";
    $mata_pelajaran_result = $conn->query($mata_pelajaran_query);

    $guru_query = "SELECT * FROM guru";
    $guru_result = $conn->query($guru_query);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Jadwal Pelajaran</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <header>
            <h1>Edit Jadwal Pelajaran</h1>
            <nav>
                <a href="admin_dashboard.php">Kembali ke Dashboard Admin</a>
            </nav>
        </header>
        <main>
            <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                <label for="hari">Hari:</label>
                <input type="text" id="hari" name="hari" value="<?php echo htmlspecialchars($jadwal['hari']); ?>" required>

                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" value="<?php echo htmlspecialchars($jadwal['tanggal']); ?>" required>

                <label for="jam_mulai">Jam Mulai:</label>
                <!-- Pastikan jam_mulai diformat menjadi 4 digit -->
                <input type="time" id="jam_mulai" name="jam_mulai" value="<?php echo date('H:i', strtotime($jadwal['jam_mulai'])); ?>" required>

                <label for="jam_selesai">Jam Selesai:</label>
                <input type="time" id="jam_selesai" name="jam_selesai" value="<?php echo date('H:i', strtotime($jadwal['jam_selesai'])); ?>" required>

                <label for="mata_pelajaran_id">Mata Pelajaran:</label>
                <select id="mata_pelajaran_id" name="mata_pelajaran_id" required>
                    <?php while ($row = $mata_pelajaran_result->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>" <?php echo ($row['id'] == $jadwal['mata_pelajaran_id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($row['nama_pelajaran']); ?>
                    </option>
                    <?php endwhile; ?>
                </select>

                <label for="guru_id">Guru:</label>
                <select id="guru_id" name="guru_id" required>
                    <?php while ($row = $guru_result->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>" <?php echo ($row['id'] == $jadwal['guru_id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($row['nama_guru']); ?>
                    </option>
                    <?php endwhile; ?>
                </select>

                <button type="submit">Simpan Perubahan</button>
            </form>
        </main>
    </body>
    </html>

    <?php
    // Menutup koneksi
    $conn->close();
    ?>
