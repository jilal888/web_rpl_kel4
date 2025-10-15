// ===== Modal Functions =====
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('active');
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('active');
    }
}

// Close modal when clicking outside
window.addEventListener('click', function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.classList.remove('active');
    }
});

// ===== Produk Page =====
document.addEventListener('DOMContentLoaded', function() {
    // Produk Modal
    const btnTambahProduk = document.getElementById('btnTambahProduk');
    const closeModalProduk = document.getElementById('closeModal');
    const btnBatalProduk = document.getElementById('btnBatalProduk');
    const formProduk = document.getElementById('formProduk');

    if (btnTambahProduk) {
        btnTambahProduk.addEventListener('click', function() {
            openModal('modalProduk');
        });
    }

    if (closeModalProduk) {
        closeModalProduk.addEventListener('click', function() {
            closeModal('modalProduk');
        });
    }

    if (btnBatalProduk) {
        btnBatalProduk.addEventListener('click', function() {
            closeModal('modalProduk');
        });
    }

    if (formProduk) {
        formProduk.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Produk berhasil disimpan!');
            closeModal('modalProduk');
            formProduk.reset();
        });
    }

    // Search Produk
    const searchProduk = document.getElementById('searchProduk');
    if (searchProduk) {
        searchProduk.addEventListener('keyup', function() {
            filterTable('searchProduk');
        });
    }

    // Filter Kategori
    const filterKategori = document.getElementById('filterKategori');
    if (filterKategori) {
        filterKategori.addEventListener('change', function() {
            filterTable('filterKategori');
        });
    }
});

// ===== Transaksi Page =====
document.addEventListener('DOMContentLoaded', function() {
    // Transaksi Modal
    const btnTransaksiBaru = document.getElementById('btnTransaksiBaru');
    const closeModalTransaksi = document.getElementById('closeModalTransaksi');
    const btnBatalTransaksi = document.getElementById('btnBatalTransaksi');
    const formTransaksi = document.getElementById('formTransaksi');

    if (btnTransaksiBaru) {
        btnTransaksiBaru.addEventListener('click', function() {
            openModal('modalTransaksi');
        });
    }

    if (closeModalTransaksi) {
        closeModalTransaksi.addEventListener('click', function() {
            closeModal('modalTransaksi');
        });
    }

    if (btnBatalTransaksi) {
        btnBatalTransaksi.addEventListener('click', function() {
            closeModal('modalTransaksi');
        });
    }

    if (formTransaksi) {
        formTransaksi.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Transaksi berhasil disimpan!');
            closeModal('modalTransaksi');
            formTransaksi.reset();
        });
    }

    // Perhitungan Kembalian
    const jumlahBayar = document.getElementById('jumlahBayar');
    const kembalian = document.getElementById('kembalian');
    const total = document.getElementById('total');

    if (jumlahBayar && kembalian && total) {
        jumlahBayar.addEventListener('input', function() {
            const totalAmount = parseFloat(total.textContent.replace(/[^0-9]/g, '')) || 0;
            const bayar = parseFloat(this.value) || 0;
            const kembali = bayar - totalAmount;
            kembalian.value = kembali >= 0 ? 'Rp ' + kembali.toLocaleString('id-ID') : 'Rp 0';
        });
    }

    // Filter Transaksi
    const filterTanggal = document.getElementById('filterTanggal');
    const filterStatus = document.getElementById('filterStatus');

    if (filterTanggal) {
        filterTanggal.addEventListener('change', function() {
            filterTable('filterTanggal');
        });
    }

    if (filterStatus) {
        filterStatus.addEventListener('change', function() {
            filterTable('filterStatus');
        });
    }
});

// ===== User Page =====
document.addEventListener('DOMContentLoaded', function() {
    // User Modal
    const btnTambahUser = document.getElementById('btnTambahUser');
    const closeModalUser = document.getElementById('closeModalUser');
    const btnBatalUser = document.getElementById('btnBatalUser');
    const formUser = document.getElementById('formUser');

    if (btnTambahUser) {
        btnTambahUser.addEventListener('click', function() {
            openModal('modalUser');
        });
    }

    if (closeModalUser) {
        closeModalUser.addEventListener('click', function() {
            closeModal('modalUser');
        });
    }

    if (btnBatalUser) {
        btnBatalUser.addEventListener('click', function() {
            closeModal('modalUser');
        });
    }

    if (formUser) {
        formUser.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('User berhasil disimpan!');
            closeModal('modalUser');
            formUser.reset();
        });
    }

    // Search User
    const searchUser = document.getElementById('searchUser');
    if (searchUser) {
        searchUser.addEventListener('keyup', function() {
            filterTable('searchUser');
        });
    }

    // Filter Role
    const filterRole = document.getElementById('filterRole');
    if (filterRole) {
        filterRole.addEventListener('change', function() {
            filterTable('filterRole');
        });
    }
});

// ===== Laporan Page =====
document.addEventListener('DOMContentLoaded', function() {
    // Tab Switching
    const tabBtns = document.querySelectorAll('.tab-btn');
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const tabName = this.getAttribute('data-tab');
            
            // Remove active from all tabs and contents
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            
            // Add active to clicked tab and corresponding content
            this.classList.add('active');
            document.getElementById(tabName).classList.add('active');
        });
    });

    // Set first tab as active
    const firstTab = document.querySelector('.tab-btn');
    if (firstTab) {
        firstTab.classList.add('active');
    }

    // Export PDF
    const btnExport = document.getElementById('btnExport');
    if (btnExport) {
        btnExport.addEventListener('click', function() {
            alert('Laporan diekspor sebagai PDF');
            // Implementasi export PDF ke sini
        });
    }

    // Filter Laporan
    const btnFilter = document.getElementById('btnFilter');
    if (btnFilter) {
        btnFilter.addEventListener('click', function() {
            const tanggalMulai = document.getElementById('filterTanggalMulai').value;
            const tanggalAkhir = document.getElementById('filterTanggalAkhir').value;
            alert(`Filter dari ${tanggalMulai} sampai ${tanggalAkhir}`);
        });
    }
});

// ===== General Filter Function =====
function filterTable(filterId) {
    const filterValue = document.getElementById(filterId)?.value.toLowerCase() || '';
    const tables = document.querySelectorAll('.table tbody');

    tables.forEach(table => {
        const rows = table.querySelectorAll('tr');
        rows.forEach(row => {
            let showRow = false;
            const cells = row.querySelectorAll('td');

            cells.forEach(cell => {
                if (cell.textContent.toLowerCase().includes(filterValue)) {
                    showRow = true;
                }
            });

            row.style.display = showRow ? '' : 'none';
        });
    });
}

// ===== Logout Function =====
document.addEventListener('DOMContentLoaded', function() {
    const logoutBtns = document.querySelectorAll('.logout-btn');
    logoutBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Anda yakin ingin logout?')) {
                // Redirect ke login atau process logout
                window.location.href = '../actions/login_action.php?logout=true';
            }
        });
    });
});

// ===== Edit & Delete Functions =====
function editItem(type, id) {
    alert(`Edit ${type} dengan ID: ${id}`);
}

function deleteItem(type, id) {
    if (confirm(`Anda yakin ingin menghapus ${type} ini?`)) {
        alert(`${type} berhasil dihapus`);
        // Reload halaman atau update table
        location.reload();
    }
}

// ===== Cart Functions (untuk Transaksi) =====
let cart = [];

document.addEventListener('DOMContentLoaded', function() {
    const productButtons = document.querySelectorAll('.product-item .btn');
    productButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const productName = this.parentElement.querySelector('.product-name').textContent;
            const productPrice = this.parentElement.querySelector('.product-price').textContent;
            addToCart(productName, productPrice);
        });
    });
});

function addToCart(productName, productPrice) {
    const price = parseInt(productPrice.replace(/[^0-9]/g, ''));
    
    // Check if product already in cart
    const existingItem = cart.find(item => item.name === productName);
    if (existingItem) {
        existingItem.qty++;
    } else {
        cart.push({
            name: productName,
            price: price,
            qty: 1
        });
    }

    updateCart();
    alert(`${productName} ditambahkan ke keranjang`);
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCart();
}

function updateCart() {
    const cartBody = document.getElementById('cartBody');
    if (!cartBody) return;

    cartBody.innerHTML = '';

    if (cart.length === 0) {
        cartBody.innerHTML = '<tr><td colspan="5" class="text-center">Keranjang kosong</td></tr>';
        updateTotal();
        return;
    }

    let total = 0;
    cart.forEach((item, index) => {
        const itemTotal = item.price * item.qty;
        total += itemTotal;

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.name}</td>
            <td><input type="number" value="${item.qty}" min="1" onchange="updateQty(${index}, this.value)" class="input-sm" style="width: 50px;"></td>
            <td>Rp ${item.price.toLocaleString('id-ID')}</td>
            <td>Rp ${itemTotal.toLocaleString('id-ID')}</td>
            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeFromCart(${index})">Hapus</button></td>
        `;
        cartBody.appendChild(row);
    });

    updateTotal();
}

function updateQty(index, qty) {
    cart[index].qty = parseInt(qty) || 1;
    updateCart();
}

function updateTotal() {
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total');
    const diskonElement = document.getElementById('diskon');

    if (!subtotalElement || !totalElement) return;

    let subtotal = 0;
    cart.forEach(item => {
        subtotal += item.price * item.qty;
    });

    const diskon = parseInt(diskonElement?.value) || 0;
    const total = subtotal - diskon;

    subtotalElement.textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
    totalElement.textContent = 'Rp ' + total.toLocaleString('id-ID');
}

// ===== Format Currency =====
function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(amount);
}

// ===== Diskon Handler =====
document.addEventListener('DOMContentLoaded', function() {
    const diskonElement = document.getElementById('diskon');
    if (diskonElement) {
        diskonElement.addEventListener('input', function() {
            updateTotal();
        });
    }
});