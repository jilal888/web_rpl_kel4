<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Sistem Kasir</title>
    <link rel="stylesheet" href="../../assets/css/style_kasir.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Kasir Pro</h2>
            </div>
            <nav class="sidebar-menu">
                <ul>
                    <li><a href="dashboard.html" class="menu-item">
                        <span class="icon">📊</span> Dashboard
                    </a></li>
                    <li><a href="transaksi.html" class="menu-item">
                        <span class="icon">💳</span> Transaksi
                    </a></li>
                    <li><a href="riwayat.html" class="menu-item">
                        <span class="icon">📋</span> Riwayat
                    </a></li>
                    <li><a href="laporan.html" class="menu-item">
                        <span class="icon">📈</span> Laporan
                    </a></li>
                    <li><a href="profile.html" class="menu-item active">
                        <span class="icon">👤</span> Profile
                    </a></li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <button class="logout-btn" onclick="logout()">Logout</button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <h1>Profile Pengguna</h1>
                <div class="header-right">
                    <div class="user-info">
                        <span id="username">Admin</span>
                        <span id="current-time"></span>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="content">
                <div class="profile-container">
                    <h2>Data Profile Saya</h2>
                    <div class="profile-form">
                        <div class="form-group">
                            <label for="profile-nama">Nama Lengkap:</label>
                            <input type="text" id="profile-nama" value="Admin Kasir">
                        </div>
                        <div class="form-group">
                            <label for="profile-email">Email:</label>
                            <input type="email" id="profile-email" value="admin@kasir.com">
                        </div>
                        <div class="form-group">
                            <label for="profile-tlp">No. Telepon:</label>
                            <input type="tel" id="profile-tlp" value="08123456789">
                        </div>
                        <div class="form-group">
                            <label for="profile-alamat">Alamat:</label>
                            <textarea id="profile-alamat" style="width: 100%; padding: 12px; border: 1px solid #bdc3c7; border-radius: 4px; font-size: 14px; font-family: inherit; min-height: 100px;">Jalan Merdeka No. 123</textarea>
                        </div>
                        <div class="form-group">
                            <label for="profile-password">Password Baru:</label>
                            <input type="password" id="profile-password" placeholder="Kosongkan jika tidak ingin mengubah">
                        </div>
                        <div class="form-group">
                            <label for="profile-password-confirm">Konfirmasi Password:</label>
                            <input type="password" id="profile-password-confirm" placeholder="Konfirmasi password baru">
                        </div>
                        <button class="btn btn-primary" onclick="simpanProfile()">Simpan Perubahan</button>
                        <button class="btn btn-secondary" onclick="resetProfile()" style="margin-left: 10px;">Batal</button>
                    </div>

                    <div style="margin-top: 40px; padding-top: 30px; border-top: 2px solid #ecf0f1;">
                        <h3>Pengaturan Akun</h3>
                        <div style="margin-top: 15px;">
                            <button class="btn btn-warning" onclick="ubahPassword()">Ubah Password</button>
                            <button class="btn btn-danger" onclick="hapusAkun()" style="margin-left: 10px;">Hapus Akun</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Detail -->
    <div id="modal-detail" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Detail</h2>
            <div id="modal-body"></div>
        </div>
    </div>

    <script src="script_kasir.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            updateTime();
            setInterval(updateTime, 1000);
            loadDataFromStorage();
            loadProfile();
        });

        function resetProfile() {
            if (confirm('Reset semua perubahan?')) {
                loadProfile();
            }
        }

        function ubahPassword() {
            alert('Fitur ubah password akan diintegrasikan dengan PHP backend');
        }

        function hapusAkun() {
            if (confirm('Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan!')) {
                alert('Permintaan penghapusan akun akan diproses oleh backend');
            }
        }

        function loadProfile() {
            const profileData = localStorage.getItem('profileData');
            if (profileData) {
                const profile = JSON.parse(profileData);
                document.getElementById('profile-nama').value = profile.nama || 'Admin Kasir';
                document.getElementById('profile-email').value = profile.email || 'admin@kasir.com';
                document.getElementById('profile-tlp').value = profile.tlp || '08123456789';
                document.getElementById('profile-alamat').value = profile.alamat || 'Jalan Merdeka No. 123';
            }
        }
    </script>
</body>
</html>