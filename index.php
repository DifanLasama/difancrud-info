<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Kelas TKJ SMKN 3 Yogyakarta</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* CSS untuk menempatkan footer di bagian bawah */
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
            padding: 20px; /* Tambahkan padding jika diperlukan */
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #0b0b0b;
            color: #fff;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px; /* Jika Anda ingin menjaga jarak dari konten sebelumnya */
            width: 100%;
            position: relative;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistem Informasi Kelas TKJ SMKN 3 Yogyakarta</h1>
        <nav>
            <ul>
                <li><a href="pages/jadwal.php">Jadwal Pelajaran</a></li>
                <li><a href="pages/nilai.php">Nilai Siswa</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Selamat Datang di Sistem Informasi Kelas TKJ</h2>
        <p>Di sini Anda dapat mengakses informasi penting seperti jadwal pelajaran, absensi siswa, dan nilai siswa.</p>
        <div class="buttons">
            <button onclick="window.location.href='pages/jadwal.php'">Lihat Jadwal Pelajaran</button>
            <button onclick="window.location.href='pages/nilai.php'">Lihat Nilai Siswa</button>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 SMKN 3 Yogyakarta - Sistem Informasi Sekolah</p>
    </footer>
</body>
</html>
