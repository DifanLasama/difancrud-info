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
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #b2f7ef 0%, #a8e6cf 100%); /* Background gradient hijau muda */
            color: #333; /* Warna teks gelap */
        }
        body {
            display: flex;
            flex-direction: column;
        }
        header {
            text-align: center;
            padding: 20px;
            background-color: rgba(0, 150, 50, 0.8); /* Latar belakang hijau transparan */
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            color: white; /* Warna teks header putih */
        }
        main {
            flex: 1;
            padding: 20px; /* Tambahkan padding jika diperlukan */
            display: flex;
            flex-direction: column;
            align-items: center; /* Pusatkan konten secara horizontal */
            justify-content: center; /* Pusatkan konten secara vertikal */
            text-align: center; /* Teks di tengah */
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #005d33; /* Warna hijau gelap untuk footer */
            color: #fff;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px; /* Jika Anda ingin menjaga jarak dari konten sebelumnya */
            width: 100%;
            position: relative;
        }

        /* CSS untuk tombol */
        .buttons {
            margin-top: 20px;
            display: flex;
            flex-direction: column; /* Mengatur tombol dalam satu kolom */
            gap: 10px; /* Jarak antar tombol */
            width: 100%; /* Memastikan tombol memenuhi lebar */
            max-width: 300px; /* Maksimal lebar tombol */
            margin: 0 auto; /* Memusatkan tombol */
        }
        button {
            padding: 15px;
            font-size: 16px;
            background-color: #3bb273; /* Warna tombol hijau */
            color: #fff;
            border: none;
            border-radius: 8px; /* Sudut tombol yang lebih halus */
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        button:hover {
            background-color: #329c5c; /* Efek hover */
            transform: translateY(-2px); /* Efek hover naik sedikit */
        }
        button:active {
            transform: translateY(0); /* Efek saat tombol diklik */
        }
        
        /* Media query untuk responsivitas */
        @media (max-width: 768px) {
            main {
                padding: 10px; /* Padding lebih kecil di perangkat kecil */
            }
            button {
                font-size: 14px; /* Ukuran font lebih kecil di perangkat kecil */
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistem Informasi Kelas TKJ SMKN 3 Yogyakarta</h1>
    </header>

    <main>
        <h2>Selamat Datang di Sistem Informasi Kelas TKJ</h2>
        <p>Temukan berbagai informasi penting di sini, mulai dari jadwal pelajaran, absensi siswa, hingga pencapaian nilai belajar. Semua dalam genggaman Anda untuk pengalaman belajar yang lebih teratur dan efisien!</p>
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
