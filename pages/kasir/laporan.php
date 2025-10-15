<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi - Kasir UMKM</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="wrapper">
        <!-- Header/Navbar -->
        <nav class="navbar">
            <div class="navbar-brand">
                <h2>Kasir UMKM</h2>
            </div>
            <div class="navbar-menu">
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="transaksi.php">Transaksi</a></li>
                    <li><a href="laporan.php" class="active">Laporan</a></li>
                    <li><a href="profile.php">Profil</a></li>
                </ul>
            </div>
            <div class="navbar-profile">
                <span>Kasir</span>
                <a href="../../actions/logout.php" class="logout-btn">Logout</a>
            </div>
        </nav>

        <div class="container">
            <!-- Sidebar -->
            <aside class="sidebar">
                <div class="sidebar-menu">
                    <h3>Menu Kasir</h3>
                    <ul>
                        <li><a href="dashboard.php">📊 Dashboard</a></li>
                        <li><a href="transaksi.php">💳 Transaksi</a></li>
                        <li><a href="laporan.php" class="active">📄 Laporan</a></li>
                        <li><a href="profile.php">👤 Profil</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="main-content">
                <div class="page-header">
                    <h1>Laporan Transaksi</h1>
                    <p>Lihat dan unduh data transaksi yang sudah dilakukan oleh kasir.</p>
                </div>

                <!-- Filter Section -->
                <div class="dashboard-section">
                    <form class="filter-form" method="GET" action="">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>">

                        <label for="status">Status:</label>
                        <select id="status" name="status">
                            <option value="">Semua</option>
                            <option value="selesai">Selesai</option>
                            <option value="pending">Pending</option>
                        </select>

                        <button type="submit" class="btn-filter">Tampilkan</button>
                        <button type="button" class="btn-download">📥 Unduh Laporan</button>
                    </form>
                </div>

                <!-- Table Section -->
                <div class="dashboard-section">
                    <h2>Data Transaksi</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#TRX045</td>
                                    <td>10 Okt 2025</td>
                                    <td>Kopi Bubuk 200gr</td>
                                    <td>3</td>
                                    <td>Rp 90.000</td>
                                    <td><span class="badge badge-success">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td>#TRX046</td>
                                    <td>10 Okt 2025</td>
                                    <td>Sabun Cuci Piring</td>
                                    <td>2</td>
                                    <td>Rp 30.000</td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>#TRX047</td>
                                    <td>09 Okt 2025</td>
                                    <td>Minyak Goreng 1L</td>
                                    <td>5</td>
                                    <td>Rp 125.000</td>
                                    <td><span class="badge badge-success">Selesai</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="../../assets/js/script.js"></script>
</body>
</html>
