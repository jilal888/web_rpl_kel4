<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kasir UMKM</title>
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
                    <li><a href="dashboard.php" class="active">Dashboard</a></li>
                    <li><a href="produk.php">Produk</a></li>
                    <li><a href="./transaksi.php">Transaksi</a></li>
                    <li><a href="laporan.php">Laporan</a></li>
                    <li><a href="user.php">User</a></li>
                </ul>
            </div>
            <div class="navbar-profile">
                <span>Admin</span>
                <a href="#" class="logout-btn">Logout</a>
            </div>
        </nav>

        <div class="container">
            <!-- Sidebar -->
            <aside class="sidebar">
                <div class="sidebar-menu">
                    <h3>Menu</h3>
                    <ul>
                        <li><a href="dashboard.php" class="active">📊 Dashboard</a></li>
                        <li><a href="produk.php">📦 Produk</a></li>
                        <li><a href="transaksi.php">💳 Transaksi</a></li>
                        <li><a href="laporan.php">📄 Laporan</a></li>
                        <li><a href="user.php">👥 User</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="main-content">
                <div class="page-header">
                    <h1>Dashboard</h1>
                    <p>Selamat datang di Sistem Kasir UMKM</p>
                </div>

                <!-- Statistics Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">📦</div>
                        <div class="stat-content">
                            <h3>Total Produk</h3>
                            <p class="stat-number">125</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">💳</div>
                        <div class="stat-content">
                            <h3>Transaksi Hari Ini</h3>
                            <p class="stat-number">42</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">💰</div>
                        <div class="stat-content">
                            <h3>Penjualan Hari Ini</h3>
                            <p class="stat-number">Rp 5.500.000</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">👥</div>
                        <div class="stat-content">
                            <h3>Total User</h3>
                            <p class="stat-number">8</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Transactions -->
                <div class="dashboard-section">
                    <h2>Transaksi Terbaru</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#TRX001</td>
                                    <td>10 Oct 2024</td>
                                    <td>Rp 250.000</td>
                                    <td><span class="badge badge-success">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td>#TRX002</td>
                                    <td>10 Oct 2024</td>
                                    <td>Rp 150.000</td>
                                    <td><span class="badge badge-success">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td>#TRX003</td>
                                    <td>10 Oct 2024</td>
                                    <td>Rp 500.000</td>
                                    <td><span class="badge badge-warning">Pending</span></td>
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