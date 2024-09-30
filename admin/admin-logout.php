<?php
session_start();
session_unset(); // Menghapus semua sesi
session_destroy(); // Menghancurkan sesi
header('Location: admin-login.php'); // Mengarahkan ke halaman login
exit;
?>
