<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - Kasir UMKM</title>
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
                    <li><a href="produk.php">Produk</a></li>
                    <li><a href="./transaksi.php">Transaksi</a></li>
                    <li><a href="laporan.php" class="active">Laporan</a></li>
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
                        <li><a href="dashboard.php">📊 Dashboard</a></li>
                        <li><a href="produk.php">📦 Produk</a></li>
                        <li><a href="transaksi.php">💳 Transaksi</a></li>
                        <li><a href="laporan.php" class="active">📄 Laporan</a></li>
                        <li><a href="user.php">👥 User</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="main-content">
                <div class="page-header">
                    <h1>Laporan</h1>
                    <button class="btn btn-primary" id="btnExport">📥 Export PDF</button>
                </div>

                <!-- Report Tabs -->
                <div class="report-tabs">
                    <button class="tab-btn active" data-tab="penjualan">Laporan Penjualan</button>
                    <button class="tab-btn" data-tab="produk">Laporan Produk</button>
                    <button class="tab-btn" data-tab="bulanan">Laporan Bulanan</button>
                </div>

                <!-- Filter Section -->
                <div class="filter-section">
                    <label for="filterTanggalMulai">Dari Tanggal:</label>
                    <input type="date" id="filterTanggalMulai" class="date-input">
                    
                    <label for="filterTanggalAkhir">Sampai Tanggal:</label>
                    <input type="date" id="filterTanggalAkhir" class="date-input">
                    
                    <button class="btn btn-secondary" id="btnFilter">Filter</button>
                </div>

                <!-- Tab Content: Laporan Penjualan -->
                <div class="tab-content active" id="penjualan">
                    <div class="report-summary">
                        <div class="summary-card">
                            <h3>Total Penjualan</h3>
                            <p class="big-number">Rp 25.500.000</p>
                        </div>
                        <div class="summary-card">
                            <h3>Total Transaksi</h3>
                            <p class="big-number">156</p>
                        </div>
                        <div class="summary-card">
                            <h3>Rata-rata Transaksi</h3>
                            <p class="big-number">Rp 163.462</p>
                        </div>
                        <div class="summary-card">
                            <h3>Total Diskon</h3>
                            <p class="big-number">Rp 1.250.000</p>
                        </div>
                    </div>

                    <div class="report-section">
                        <h2>Detail Penjualan</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>No Transaksi</th>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10 Oct 2024</td>
                                        <td>#TRX0001</td>
                                        <td>Kopi Hitam x1, Roti Tawar x2</td>
                                        <td>3</td>
                                        <td>Rp 250.000</td>
                                    </tr>
                                    <tr>
                                        <td>10 Oct 2024</td>
                                        <td>#TRX0002</td>
                                        <td>Teh Botol x5</td>
                                        <td>5</td>
                                        <td>Rp 150.000</td>
                                    </tr>
                                    <tr>
                                        <td>09 Oct 2024</td>
                                        <td>#TRX0003</td>
                                        <td>USB Flash Drive x1</td>
                                        <td>1</td>
                                        <td>Rp 500.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tab Content: Laporan Produk -->
                <div class="tab-content" id="produk">
                    <div class="report-section">
                        <h2>Produk Terlaris</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Terjual</th>
                                        <th>Total Harga</th>
                                        <th>Stok Tersisa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kopi Hitam</td>
                                        <td>Minuman</td>
                                        <td>85</td>
                                        <td>Rp 425.000</td>
                                        <td>65</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Teh Botol</td>
                                        <td>Minuman</td>
                                        <td>120</td>
                                        <td>Rp 480.000</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Roti Tawar</td>
                                        <td>Makanan</td>
                                        <td>45</td>
                                        <td>Rp 675.000</td>
                                        <td>15</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>USB Flash Drive</td>
                                        <td>Elektronik</td>
                                        <td>8</td>
                                        <td>Rp 600.000</td>
                                        <td>7</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="report-section">
                        <h2>Stok Menipis</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Stok</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>USB Flash Drive</td>
                                        <td>7</td>
                                        <td><span class="badge badge-danger">Kritis</span></td>
                                    </tr>
                                    <tr>
                                        <td>Roti Tawar</td>
                                        <td>15</td>
                                        <td><span class="badge badge-warning">Menipis</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tab Content: Laporan Bulanan -->
                <div class="tab-content" id="bulanan">
                    <div class="report-section">
                        <h2>Perbandingan Penjualan Bulanan</h2>
                        <div class="chart-container">
                            <canvas id="chartBulanan"></canvas>
                        </div>
                    </div>

                    <div class="report-section">
                        <h2>Ringkasan Bulanan</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Bulan</th>
                                        <th>Total Penjualan</th>
                                        <th>Total Transaksi</th>
                                        <th>Rata-rata</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Oktober 2024</td>
                                        <td>Rp 25.500.000</td>
                                        <td>156</td>
                                        <td>Rp 163.462</td>
                                    </tr>
                                    <tr>
                                        <td>September 2024</td>
                                        <td>Rp 22.300.000</td>
                                        <td>138</td>
                                        <td>Rp 161.594</td>
                                    </tr>
                                    <tr>
                                        <td>Agustus 2024</td>
                                        <td>Rp 19.800.000</td>
                                        <td>125</td>
                                        <td>Rp 158.400</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="../../assets/js/script.js"></script>
</body>
</html>