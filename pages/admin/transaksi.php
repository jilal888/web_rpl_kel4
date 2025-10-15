<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - Kasir UMKM</title>
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
                    <li><a href="transaksi.php" class="active">Transaksi</a></li>
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
                        <li><a href="dashboard.php">📊 Dashboard</a></li>
                        <li><a href="produk.php">📦 Produk</a></li>
                        <li><a href="transaksi.php" class="active">💳 Transaksi</a></li>
                        <li><a href="laporan.php">📄 Laporan</a></li>
                        <li><a href="user.php">👥 User</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="main-content">
                <div class="page-header">
                    <h1>Manajemen Transaksi</h1>
                    <button class="btn btn-primary" id="btnTransaksiBaru">+ Transaksi Baru</button>
                </div>

                <!-- Filter Section -->
                <div class="filter-section">
                    <input type="date" id="filterTanggal" class="date-input">
                    <select id="filterStatus" class="select-input">
                        <option value="">Semua Status</option>
                        <option value="selesai">Selesai</option>
                        <option value="pending">Pending</option>
                        <option value="batal">Batal</option>
                    </select>
                </div>

                <!-- Transactions Table -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Transaksi</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Total</th>
                                <th>Pembayaran</th>
                                <th>Kembalian</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#TRX0001</td>
                                <td>10 Oct 2024</td>
                                <td>09:30</td>
                                <td>Rp 250.000</td>
                                <td>Rp 250.000</td>
                                <td>Rp 0</td>
                                <td><span class="badge badge-success">Selesai</span></td>
                                <td>
                                    <button class="btn btn-sm btn-info">Detail</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>#TRX0002</td>
                                <td>10 Oct 2024</td>
                                <td>10:15</td>
                                <td>Rp 150.000</td>
                                <td>Rp 200.000</td>
                                <td>Rp 50.000</td>
                                <td><span class="badge badge-success">Selesai</span></td>
                                <td>
                                    <button class="btn btn-sm btn-info">Detail</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>#TRX0003</td>
                                <td>10 Oct 2024</td>
                                <td>11:45</td>
                                <td>Rp 500.000</td>
                                <td>-</td>
                                <td>-</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-sm btn-info">Detail</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>#TRX0004</td>
                                <td>09 Oct 2024</td>
                                <td>14:20</td>
                                <td>Rp 75.000</td>
                                <td>Rp 100.000</td>
                                <td>Rp 25.000</td>
                                <td><span class="badge badge-success">Selesai</span></td>
                                <td>
                                    <button class="btn btn-sm btn-info">Detail</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal Transaksi Baru -->
    <div class="modal" id="modalTransaksi">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h2>Transaksi Baru</h2>
                <button class="close-btn" id="closeModalTransaksi">&times;</button>
            </div>
            <form class="form" id="formTransaksi">
                <div class="transaksi-container">
                    <!-- Left Column: Product Selection -->
                    <div class="transaksi-left">
                        <h3>Pilih Produk</h3>
                        <div class="product-search">
                            <input type="text" id="searchProdukTransaksi" placeholder="Cari produk..." class="search-input">
                        </div>
                        <div class="product-list">
                            <div class="product-item">
                                <p class="product-name">Kopi Hitam</p>
                                <p class="product-price">Rp 5.000</p>
                                <button type="button" class="btn btn-sm btn-primary">Pilih</button>
                            </div>
                            <div class="product-item">
                                <p class="product-name">Roti Tawar</p>
                                <p class="product-price">Rp 15.000</p>
                                <button type="button" class="btn btn-sm btn-primary">Pilih</button>
                            </div>
                            <div class="product-item">
                                <p class="product-name">Teh Botol</p>
                                <p class="product-price">Rp 4.000</p>
                                <button type="button" class="btn btn-sm btn-primary">Pilih</button>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Cart -->
                    <div class="transaksi-right">
                        <h3>Keranjang</h3>
                        <div class="cart-items">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="cartBody">
                                    <tr>
                                        <td colspan="5" class="text-center">Keranjang kosong</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="cart-summary">
                            <div class="summary-row">
                                <span>Subtotal:</span>
                                <strong id="subtotal">Rp 0</strong>
                            </div>
                            <div class="summary-row">
                                <span>Diskon:</span>
                                <input type="number" id="diskon" value="0" class="input-sm">
                            </div>
                            <div class="summary-row">
                                <span>Total:</span>
                                <strong id="total" class="text-lg">Rp 0</strong>
                            </div>
                        </div>

                        <div class="payment-section">
                            <div class="form-group">
                                <label for="jumlahBayar">Jumlah Bayar</label>
                                <input type="number" id="jumlahBayar" placeholder="Rp 0" required>
                            </div>
                            <div class="form-group">
                                <label for="kembalian">Kembalian</label>
                                <input type="number" id="kembalian" placeholder="Rp 0" readonly>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-block">Selesaikan Transaksi</button>
                            <button type="button" class="btn btn-secondary btn-block" id="btnBatalTransaksi">Batal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>
</html>