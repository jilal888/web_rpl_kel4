<?php
// Mulai sesi (kalau nanti mau dipakai login)
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir UMKM Kelompok 4</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="font-family: Arial, sans-serif; margin: 0; background: #f7f7f7;">

    <header style="background-color: #007bff; color: white; text-align: center; padding: 20px;">
        <h1>💻 Sistem Kasir UMKM Kelompok 4</h1>
    </header>

    <main style="padding: 20px; text-align: center;">
        <h2>Selamat Datang di Aplikasi Kasir</h2>
        <p>Silakan pilih peran untuk melanjutkan:</p>
        <div style="margin-top: 20px;">
            <a href="pages/login.php" 
               style="text-decoration: none; background: #28a745; color: white; padding: 10px 20px; border-radius: 5px; margin: 10px;">
               Login
            </a>
            <a href="pages/admin/dashboard.php" 
               style="text-decoration: none; background: #ffc107; color: black; padding: 10px 20px; border-radius: 5px; margin: 10px;">
               Dashboard Admin
            </a>
            <a href="pages/kasir/dashboard.php" 
               style="text-decoration: none; background: #17a2b8; color: white; padding: 10px 20px; border-radius: 5px; margin: 10px;">
               Dashboard Kasir
            </a>
        </div>
    </main>

    <footer style="background: #333; color: white; text-align: center; padding: 10px; position: fixed; bottom: 0; width: 100%;">
        <p>&copy; <?php echo date("Y"); ?> Kelompok 4 - RPL</p>
    </footer>

</body>
</html>
