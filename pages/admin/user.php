<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Kasir UMKM</title>
    <link rel="stylesheet" href="../../assets/css/style.css ">
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
                    <li><a href="transaksi.php">Transaksi</a></li>
                    <li><a href="laporan.php">Laporan</a></li>
                    <li><a href="user.php" class="active">User</a></li>
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
                        <li><a href="laporan.php">📄 Laporan</a></li>
                        <li><a href="user.php" class="active">👥 User</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="main-content">
                <div class="page-header">
                    <h1>Manajemen User</h1>
                    <button class="btn btn-primary" id="btnTambahUser">+ Tambah User</button>
                </div>

                <!-- Filter Section -->
                <div class="filter-section">
                    <input type="text" id="searchUser" placeholder="Cari user..." class="search-input">
                    <select id="filterRole" class="select-input">
                        <option value="">Semua Role</option>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                        <option value="viewer">Viewer</option>
                    </select>
                </div>

                <!-- Users Table -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Terdaftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>admin01</td>
                                <td>Budi Santoso</td>
                                <td>budi@example.com</td>
                                <td><span class="badge badge-primary">Admin</span></td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>01 Jan 2024</td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>kasir01</td>
                                <td>Siti Nurhaliza</td>
                                <td>siti@example.com</td>
                                <td><span class="badge badge-info">Kasir</span></td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>05 Jan 2024</td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>kasir02</td>
                                <td>Ahmad Wijaya</td>
                                <td>ahmad@example.com</td>
                                <td><span class="badge badge-info">Kasir</span></td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>10 Jan 2024</td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>viewer01</td>
                                <td>Rina Putri</td>
                                <td>rina@example.com</td>
                                <td><span class="badge badge-secondary">Viewer</span></td>
                                <td><span class="badge badge-warning">Nonaktif</span></td>
                                <td>15 Jan 2024</td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>kasir03</td>
                                <td>Yudha Pratama</td>
                                <td>yudha@example.com</td>
                                <td><span class="badge badge-info">Kasir</span></td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>20 Feb 2024</td>
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

    <!-- Modal Tambah/Edit User -->
    <div class="modal" id="modalUser">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tambah User</h2>
                <button class="close-btn" id="closeModalUser">&times;</button>
            </div>
            <form class="form" id="formUser">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="text" id="namaLengkap" name="nama_lengkap" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Konfirmasi Password</label>
                        <input type="password" id="confirmPassword" name="confirm_password" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" name="role" required>
                            <option value="">Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                            <option value="viewer">Viewer</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" id="btnBatalUser">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>
</html>