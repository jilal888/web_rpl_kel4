<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Kasir UMKM</title>
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
                    <li><a href="produk.php" class="active">Produk</a></li>
                    <li><a href="transaksi.php">Transaksi</a></li>
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
                        <li><a href="produk.php" class="active">📦 Produk</a></li>
                        <li><a href="transaksi.php">💳 Transaksi</a></li>
                        <li><a href="laporan.php">📄 Laporan</a></li>
                        <li><a href="user.php">👥 User</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="main-content">
                <div class="page-header">
                    <h1>Manajemen Produk</h1>
                    <button class="btn btn-primary" id="btnTambahProduk">+ Tambah Produk</button>
                </div>

                <!-- Filter Section -->
                <div class="filter-section">
                    <input type="text" id="searchProduk" placeholder="Cari produk..." class="search-input">
                    <select id="filterKategori" class="select-input">
                        <option value="">Semua Kategori</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                        <option value="elektronik">Elektronik</option>
                    </select>
                </div>

                <!-- Products Table -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kopi Hitam</td>
                                <td>Minuman</td>
                                <td>Rp 5.000</td>
                                <td><span class="badge badge-success">150</span></td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Roti Tawar</td>
                                <td>Makanan</td>
                                <td>Rp 15.000</td>
                                <td><span class="badge badge-success">45</span></td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>USB Flash Drive</td>
                                <td>Elektronik</td>
                                <td>Rp 75.000</td>
                                <td><span class="badge badge-warning">12</span></td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Teh Botol</td>
                                <td>Minuman</td>
                                <td>Rp 4.000</td>
                                <td><span class="badge badge-danger">3</span></td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal Tambah/Edit Produk -->
    <div class="modal" id="modalProduk">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tambah Produk</h2>
                <button class="close-btn" id="closeModal">&times;</button>
            </div>
            <form class="form" id="formProduk">
                <div class="form-group">
                    <label for="namaProduk">Nama Produk</label>
                    <input type="text" id="namaProduk" name="nama_produk" required>
                </div>

                <div class="form-group">
                    <label for="kategoriProduk">Kategori</label>
                    <select id="kategoriProduk" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                        <option value="elektronik">Elektronik</option>
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="hargaProduk">Harga</label>
                        <input type="number" id="hargaProduk" name="harga" required>
                    </div>

                    <div class="form-group">
                        <label for="stokProduk">Stok</label>
                        <input type="number" id="stokProduk" name="stok" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deskripsiProduk">Deskripsi</label>
                    <textarea id="deskripsiProduk" name="deskripsi" rows="3"></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" id="btnBatalProduk">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>
</html>