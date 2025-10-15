// ===== GLOBAL VARIABLES =====
let transaksiItems = [];
let riwayatTransaksi = [];
let currentPage = 'dashboard';

// ===== INITIALIZE =====
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
    setupEventListeners();
    updateTime();
    setInterval(updateTime, 1000);
    loadDataFromStorage();
});

// ===== INITIALIZATION FUNCTIONS =====
function initializeApp() {
    console.log('Aplikasi Kasir dimulai');
    updateDashboard();
}

function setupEventListeners() {
    // Menu navigation
    document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', handleMenuClick);
    });

    // Transaksi page
    document.getElementById('btn-tambah-item').addEventListener('click', tambahItemTransaksi);
    document.getElementById('btn-reset-transaksi').addEventListener('click', resetTransaksi);
    document.getElementById('btn-selesai-transaksi').addEventListener('click', selesaiTransaksi);
    
    // Input listeners for auto-calculate
    document.getElementById('diskon').addEventListener('change', hitungTotalBayar);
    document.getElementById('pajak').addEventListener('change', hitungTotalBayar);

    // Riwayat page
    document.getElementById('btn-filter').addEventListener('click', filterRiwayat);
    document.getElementById('btn-reset-filter').addEventListener('click', resetFilterRiwayat);

    // Laporan page
    document.getElementById('btn-filter-laporan').addEventListener('click', filterLaporan);
    document.getElementById('btn-cetak-laporan').addEventListener('click', cetakLaporan);

    // Profile page
    document.getElementById('btn-simpan-profile').addEventListener('click', simpanProfile);

    // Logout
    document.querySelector('.logout-btn').addEventListener('click', logout);

    // Modal close
    document.querySelector('.close').addEventListener('click', closeModal);
    window.addEventListener('click', closeModalOnClickOutside);
}

// ===== TIME UPDATE =====
function updateTime() {
    const now = new Date();
    const timeString = now.toLocaleTimeString('id-ID');
    document.getElementById('current-time').textContent = timeString;
}

// ===== MENU NAVIGATION =====
function handleMenuClick(e) {
    e.preventDefault();
    
    // Remove active class dari semua menu
    document.querySelectorAll('.menu-item').forEach(item => {
        item.classList.remove('active');
    });
    
    // Tambah active class ke menu yang diklik
    e.currentTarget.classList.add('active');
    
    // Get page name
    const pageName = e.currentTarget.getAttribute('data-page');
    navigateTo(pageName);
}

function navigateTo(page) {
    // Sembunyikan semua page
    document.querySelectorAll('.page').forEach(p => {
        p.classList.remove('active');
    });
    
    // Tampilkan page yang dipilih
    const pageElement = document.getElementById(`page-${page}`);
    if (pageElement) {
        pageElement.classList.add('active');
    }
    
    // Update title
    const titles = {
        dashboard: 'Dashboard',
        transaksi: 'Tambah Transaksi',
        riwayat: 'Riwayat Transaksi',
        laporan: 'Laporan Penjualan',
        profile: 'Profile Pengguna'
    };
    
    document.getElementById('page-title').textContent = titles[page] || 'Dashboard';
    currentPage = page;
    
    // Load specific page data
    if (page === 'riwayat') {
        loadRiwayat();
    } else if (page === 'laporan') {
        loadLaporan();
    }
}

// ===== TRANSAKSI FUNCTIONS =====
function tambahItemTransaksi() {
    const namaBarang = document.getElementById('nama-barang').value.trim();
    const hargaBarang = parseFloat(document.getElementById('harga-barang').value);
    const jumlahBarang = parseInt(document.getElementById('jumlah-barang').value);

    // Validasi
    if (!namaBarang) {
        alert('Nama barang tidak boleh kosong');
        return;
    }

    if (isNaN(hargaBarang) || hargaBarang <= 0) {
        alert('Harga harus angka positif');
        return;
    }

    if (isNaN(jumlahBarang) || jumlahBarang <= 0) {
        alert('Jumlah harus angka positif');
        return;
    }

    // Buat item baru
    const item = {
        id: Date.now(),
        nama: namaBarang,
        harga: hargaBarang,
        jumlah: jumlahBarang,
        subtotal: hargaBarang * jumlahBarang
    };

    // Tambah ke array
    transaksiItems.push(item);

    // Update tampilan
    renderTransaksiTable();
    hitungTotalBayar();

    // Reset form
    document.getElementById('nama-barang').value = '';
    document.getElementById('harga-barang').value = '';
    document.getElementById('jumlah-barang').value = '1';
    document.getElementById('nama-barang').focus();
}

function renderTransaksiTable() {
    const tbody = document.getElementById('tbody-transaksi');
    tbody.innerHTML = '';

    if (transaksiItems.length === 0) {
        tbody.innerHTML = '<tr class="empty-row"><td colspan="6" style="text-align: center; color: #999;">Belum ada item</td></tr>';
        return;
    }

    transaksiItems.forEach((item, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${item.nama}</td>
            <td>Rp ${formatRupiah(item.harga)}</td>
            <td>${item.jumlah}</td>
            <td>Rp ${formatRupiah(item.subtotal)}</td>
            <td>
                <button class="btn btn-warning" onclick="editItem(${item.id})" style="padding: 6px 12px; font-size: 12px;">Edit</button>
                <button class="btn btn-danger" onclick="hapusItem(${item.id})" style="padding: 6px 12px; font-size: 12px;">Hapus</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

function hapusItem(id) {
    transaksiItems = transaksiItems.filter(item => item.id !== id);
    renderTransaksiTable();
    hitungTotalBayar();
}

function editItem(id) {
    const item = transaksiItems.find(i => i.id === id);
    if (item) {
        document.getElementById('nama-barang').value = item.nama;
        document.getElementById('harga-barang').value = item.harga;
        document.getElementById('jumlah-barang').value = item.jumlah;
        hapusItem(id);
        document.getElementById('nama-barang').focus();
    }
}

function hitungTotalBayar() {
    const subtotal = transaksiItems.reduce((total, item) => total + item.subtotal, 0);
    const diskon = parseFloat(document.getElementById('diskon').value) || 0;
    const pajak = parseFloat(document.getElementById('pajak').value) || 0;

    const diskonRp = (subtotal * diskon) / 100;
    const setelahDiskon = subtotal - diskonRp;
    const pajakRp = (setelahDiskon * pajak) / 100;
    const totalBayar = setelahDiskon + pajakRp;

    document.getElementById('subtotal').textContent = `Rp ${formatRupiah(subtotal)}`;
    document.getElementById('total-bayar').textContent = `Rp ${formatRupiah(totalBayar)}`;
}

function resetTransaksi() {
    transaksiItems = [];
    document.getElementById('nama-barang').value = '';
    document.getElementById('harga-barang').value = '';
    document.getElementById('jumlah-barang').value = '1';
    document.getElementById('diskon').value = '0';
    document.getElementById('pajak').value = '0';
    renderTransaksiTable();
    hitungTotalBayar();
}

function selesaiTransaksi() {
    if (transaksiItems.length === 0) {
        alert('Tidak ada item untuk ditransaksikan');
        return;
    }

    const subtotal = transaksiItems.reduce((total, item) => total + item.subtotal, 0);
    const diskon = parseFloat(document.getElementById('diskon').value) || 0;
    const pajak = parseFloat(document.getElementById('pajak').value) || 0;

    const diskonRp = (subtotal * diskon) / 100;
    const setelahDiskon = subtotal - diskonRp;
    const pajakRp = (setelahDiskon * pajak) / 100;
    const totalBayar = setelahDiskon + pajakRp;

    const transaksi = {
        id: Date.now(),
        tanggal: new Date().toLocaleString('id-ID'),
        noTransaksi: 'TRX-' + Date.now(),
        items: [...transaksiItems],
        subtotal: subtotal,
        diskon: diskonRp,
        pajak: pajakRp,
        totalBayar: totalBayar,
        status: 'Selesai'
    };

    riwayatTransaksi.unshift(transaksi);
    saveDataToStorage();
    
    alert(`Transaksi berhasil!\nNo: ${transaksi.noTransaksi}\nTotal: Rp ${formatRupiah(totalBayar)}`);
    
    resetTransaksi();
    updateDashboard();
}

// ===== RIWAYAT FUNCTIONS =====
function loadRiwayat() {
    renderRiwayatTable(riwayatTransaksi);
}

function renderRiwayatTable(data) {
    const tbody = document.getElementById('tbody-riwayat');
    tbody.innerHTML = '';

    if (data.length === 0) {
        tbody.innerHTML = '<tr class="empty-row"><td colspan="6" style="text-align: center; color: #999;">Belum ada riwayat</td></tr>';
        return;
    }

    data.forEach((transaksi, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${transaksi.tanggal}</td>
            <td>${transaksi.noTransaksi}</td>
            <td>Rp ${formatRupiah(transaksi.totalBayar)}</td>
            <td><span class="badge" style="background-color: #27ae60; color: white; padding: 4px 8px; border-radius: 3px;">${transaksi.status}</span></td>
            <td>
                <button class="btn btn-secondary" onclick="lihatDetail(${transaksi.id})" style="padding: 6px 12px; font-size: 12px;">Detail</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

function filterRiwayat() {
    const tanggal = document.getElementById('filter-tanggal').value;
    
    if (!tanggal) {
        alert('Pilih tanggal terlebih dahulu');
        return;
    }

    const filtered = riwayatTransaksi.filter(transaksi => {
        const transaksiTanggal = transaksi.tanggal.split(' ')[0];
        return transaksiTanggal === tanggal;
    });

    renderRiwayatTable(filtered);
}

function resetFilterRiwayat() {
    document.getElementById('filter-tanggal').value = '';
    loadRiwayat();
}

function lihatDetail(id) {
    const transaksi = riwayatTransaksi.find(t => t.id === id);
    if (transaksi) {
        const modal = document.getElementById('modal-detail');
        const modalBody = document.getElementById('modal-body');
        
        let itemsHTML = '<table style="width: 100%; border-collapse: collapse;">';
        itemsHTML += '<thead><tr style="background-color: #ecf0f1;"><th style="padding: 8px; border: 1px solid #bdc3c7;">Barang</th><th style="padding: 8px; border: 1px solid #bdc3c7;">Harga</th><th style="padding: 8px; border: 1px solid #bdc3c7;">Qty</th><th style="padding: 8px; border: 1px solid #bdc3c7;">Subtotal</th></tr></thead>';
        itemsHTML += '<tbody>';
        
        transaksi.items.forEach(item => {
            itemsHTML += `<tr><td style="padding: 8px; border: 1px solid #bdc3c7;">${item.nama}</td><td style="padding: 8px; border: 1px solid #bdc3c7;">Rp ${formatRupiah(item.harga)}</td><td style="padding: 8px; border: 1px solid #bdc3c7;">${item.jumlah}</td><td style="padding: 8px; border: 1px solid #bdc3c7;">Rp ${formatRupiah(item.subtotal)}</td></tr>`;
        });
        
        itemsHTML += '</tbody></table>';
        
        modalBody.innerHTML = `
            <div style="margin-bottom: 15px;">
                <p><strong>No. Transaksi:</strong> ${transaksi.noTransaksi}</p>
                <p><strong>Tanggal:</strong> ${transaksi.tanggal}</p>
            </div>
            ${itemsHTML}
            <div style="margin-top: 15px; border-top: 2px solid #ecf0f1; padding-top: 15px;">
                <p style="display: flex; justify-content: space-between;"><span>Subtotal:</span> <strong>Rp ${formatRupiah(transaksi.subtotal)}</strong></p>
                <p style="display: flex; justify-content: space-between;"><span>Diskon:</span> <strong>Rp ${formatRupiah(transaksi.diskon)}</strong></p>
                <p style="display: flex; justify-content: space-between;"><span>Pajak:</span> <strong>Rp ${formatRupiah(transaksi.pajak)}</strong></p>
                <p style="display: flex; justify-content: space-between; font-size: 18px; font-weight: 700; color: #3498db;"><span>Total:</span> <strong>Rp ${formatRupiah(transaksi.totalBayar)}</strong></p>
            </div>
        `;
        
        modal.style.display = 'block';
    }
}

// ===== LAPORAN FUNCTIONS =====
function loadLaporan() {
    filterLaporan();
}

function filterLaporan() {
    const bulan = document.getElementById('filter-bulan').value;
    let filtered = riwayatTransaksi;

    if (bulan) {
        filtered = riwayatTransaksi.filter(transaksi => {
            const [tahun, bulanTransaksi] = transaksi.tanggal.substring(0, 7).split('-');
            return `${tahun}-${bulanTransaksi}` === bulan;
        });
    }

    renderLaporan(filtered);
}

function renderLaporan(data) {
    // Hitung summary
    const totalPenjualan = data.reduce((total, t) => total + t.totalBayar, 0);
    const totalTransaksi = data.length;
    const rataRata = totalTransaksi > 0 ? totalPenjualan / totalTransaksi : 0;

    document.getElementById('laporan-total').textContent = `Rp ${formatRupiah(totalPenjualan)}`;
    document.getElementById('laporan-transaksi').textContent = totalTransaksi;
    document.getElementById('laporan-rata-rata').textContent = `Rp ${formatRupiah(rataRata)}`;

    // Render table
    const tbody = document.getElementById('tbody-laporan');
    tbody.innerHTML = '';

    if (data.length === 0) {
        tbody.innerHTML = '<tr class="empty-row"><td colspan="3" style="text-align: center; color: #999;">Tidak ada data</td></tr>';
        return;
    }

    data.forEach(transaksi => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${transaksi.tanggal.split(' ')[0]}</td>
            <td>${transaksi.noTransaksi}</td>
            <td>Rp ${formatRupiah(transaksi.totalBayar)}</td>
        `;
        tbody.appendChild(row);
    });
}

function cetakLaporan() {
    const bulan = document.getElementById('filter-bulan').value || new Date().toISOString().substring(0, 7);
    let filtered = riwayatTransaksi.filter(transaksi => {
        return transaksi.tanggal.substring(0, 7) === bulan;
    });

    if (filtered.length === 0) {
        alert('Tidak ada data untuk dicetak');
        return;
    }

    const totalPenjualan = filtered.reduce((total, t) => total + t.totalBayar, 0);
    const totalTransaksi = filtered.length;

    let printContent = `
        <html>
        <head>
            <title>Laporan Penjualan</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                h1 { text-align: center; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { border: 1px solid #000; padding: 10px; text-align: left; }
                th { background-color: #f0f0f0; }
                .summary { margin-top: 20px; }
            </style>
        </head>
        <body>
            <h1>LAPORAN PENJUALAN</h1>
            <p style="text-align: center;">Bulan: ${bulan}</p>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>No. Transaksi</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
    `;

    filtered.forEach((transaksi, index) => {
        printContent += `
            <tr>
                <td>${index + 1}</td>
                <td>${transaksi.tanggal}</td>
                <td>${transaksi.noTransaksi}</td>
                <td>Rp ${formatRupiah(transaksi.totalBayar)}</td>
            </tr>
        `;
    });

    printContent += `
                </tbody>
            </table>
            <div class="summary">
                <p><strong>Total Transaksi:</strong> ${totalTransaksi}</p>
                <p><strong>Total Penjualan:</strong> Rp ${formatRupiah(totalPenjualan)}</p>
                <p><strong>Rata-rata Transaksi:</strong> Rp ${formatRupiah(totalPenjualan / totalTransaksi)}</p>
            </div>
        </body>
        </html>
    `;

    const printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.write(printContent);
    printWindow.document.close();
    printWindow.print();
}

// ===== PROFILE FUNCTIONS =====
function simpanProfile() {
    const nama = document.getElementById('profile-nama').value;
    const email = document.getElementById('profile-email').value;
    const tlp = document.getElementById('profile-tlp').value;
    const password = document.getElementById('profile-password').value;

    if (!nama || !email || !tlp) {
        alert('Semua field harus diisi');
        return;
    }

    // Update username di header
    document.getElementById('username').textContent = nama;

    // Save to storage
    const profileData = {
        nama: nama,
        email: email,
        tlp: tlp
    };

    localStorage.setItem('profileData', JSON.stringify(profileData));
    alert('Profile berhasil disimpan');
}

// ===== DASHBOARD FUNCTIONS =====
function updateDashboard() {
    const today = new Date().toISOString().split('T')[0];
    const todayTransaksi = riwayatTransaksi.filter(t => t.tanggal.split(' ')[0] === today);

    const totalPenjualanHari = todayTransaksi.reduce((total, t) => total + t.totalBayar, 0);
    const totalUnit = todayTransaksi.reduce((total, t) => total + t.items.reduce((sum, item) => sum + item.jumlah, 0), 0);

    document.getElementById('total-penjualan').textContent = `Rp ${formatRupiah(totalPenjualanHari)}`;
    document.getElementById('total-transaksi').textContent = todayTransaksi.length;
    document.getElementById('produk-terjual').textContent = totalUnit;
}

// ===== MODAL FUNCTIONS =====
function closeModal() {
    document.getElementById('modal-detail').style.display = 'none';
}

function closeModalOnClickOutside(e) {
    const modal = document.getElementById('modal-detail');
    if (e.target === modal) {
        modal.style.display = 'none';
    }
}

// ===== UTILITY FUNCTIONS =====
function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(angka);
}

function logout() {
    if (confirm('Anda yakin ingin logout?')) {
        alert('Anda telah logout');
        window.location.reload();
    }
}

// ===== STORAGE FUNCTIONS =====
function saveDataToStorage() {
    localStorage.setItem('riwayatTransaksi', JSON.stringify(riwayatTransaksi));
}

function loadDataFromStorage() {
    const stored = localStorage.getItem('riwayatTransaksi');
    if (stored) {
        riwayatTransaksi = JSON.parse(stored);
    }

    const profileStored = localStorage.getItem('profileData');
    if (profileStored) {
        const profile = JSON.parse(profileStored);
        document.getElementById('username').textContent = profile.nama;
        document.getElementById('profile-nama').value = profile.nama;
        document.getElementById('profile-email').value = profile.email;
        document.getElementById('profile-tlp').value = profile.tlp;
    }

    updateDashboard();
}