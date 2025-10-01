<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Reset dasar dan font */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            color: #333;
        }

        .page-container {
            display: flex;
            min-height: 100vh;
        }

        /* === STYLING SIDEBAR === */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            flex-shrink: 0; /* Mencegah sidebar menyusut */
        }

        .sidebar-header {
            padding: 1.5rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 1px solid #34495e;
        }

        .sidebar-nav {
            flex-grow: 1;
        }

        .sidebar-nav h3 {
            padding: 1rem 1.5rem 0.5rem;
            font-size: 0.8rem;
            text-transform: uppercase;
            color: #95a5a6;
            margin: 0;
        }

        .sidebar-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav ul li a {
            display: block;
            color: #ecf0f1;
            text-decoration: none;
            padding: 1rem 1.5rem;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-nav ul li a:hover {
            background-color: #34495e;
            border-left: 3px solid #3498db;
        }

        .sidebar-footer {
            padding: 1.5rem;
        }

        .logout-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #e74c3c;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }


        /* === STYLING KONTEN UTAMA === */
        .main-content {
            flex-grow: 1;
            padding: 2rem;
            overflow-y: auto; /* Agar bisa di-scroll jika konten panjang */
        }

        .header h2 {
            margin: 0 0 0.5rem 0;
            color: #2c3e50;
        }

        .header p {
            margin: 0 0 2rem 0;
            color: #7f8c8d;
        }

        .content-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
        }

        .content-card h3 {
            margin-top: 0;
            border-bottom: 1px solid #eee;
            padding-bottom: 1rem;
        }

        /* Styling untuk tabel daftar pekerjaan */
        .job-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
        }

        .job-table th, .job-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .job-table thead th {
            background-color: #f4f7f9;
            font-weight: bold;
        }

        .job-table tbody tr:hover {
            background-color: #f9f9f9;
        }

        /* Badge untuk status */
        .status {
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            color: #fff;
            font-weight: bold;
        }
        .status-selesai { background-color: #2ecc71; }
        .status-dikerjakan { background-color: #3498db; }
        .status-menunggu { background-color: #f39c12; }

        /* Tombol aksi di tabel */
        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            margin-right: 5px;
        }
        .btn-detail { background-color: #3498db; }
        .btn-hapus { background-color: #e74c3c; }

        /* === RESPONSIVE DESIGN === */
        @media (max-width: 768px) {
            .page-container {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>

    <div class="page-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                Dashboard
            </div>
            <nav class="sidebar-nav">
                <?php if ($role === 'superadmin'): ?>
                    <h3>Menu Superadmin</h3>
                    <ul>
                        <li><a href="#">Kelola User</a></li>
                        <li><a href="#">Kelola Barang</a></li>
                        <li><a href="#">Laporan</a></li>
                    </ul>
                <?php elseif ($role === 'admin'): ?>
                    <h3>Menu Admin</h3>
                    <ul>
                        <li><a href="#">Input Barang</a></li>
                        <li><a href="#">Data Barang</a></li>
                    </ul>
                <?php elseif ($role === 'kepala_pegawai'): ?>
                    <h3>Menu Kepala Pegawai</h3>
                    <ul>
                        <li><a href="#">Input Pegawai</a></li>
                        <li><a href="#">Data Pegawai</a></li>
                    </ul>
                <?php else: ?>
                    <h3>Menu User</h3>
                    <ul>
                        <li><a href="#">Lihat Produk</a></li>
                        <li><a href="#">Riwayat Transaksi</a></li>
                    </ul>
                <?php endif; ?>
            </nav>
            <div class="sidebar-footer">
                <a href="<?= site_url('logout') ?>" class="logout-btn">Logout</a>
            </div>
        </aside>

        <main class="main-content">
            <div class="header">
                <h2>Selamat datang, <?= esc($username) ?>!</h2>
                <p>Role anda: <strong><?= esc($role) ?></strong></p>
            </div>

            <div class="content-card">
                <h3>Daftar Pekerjaan Terbaru</h3>
                <table class="job-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Pekerjaan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Memperbaiki Bug Halaman Login</td>
                            <td><span class="status status-selesai">Selesai</span></td>
                            <td>
                                <a href="#" class="action-btn btn-detail">Detail</a>
                                <a href="#" class="action-btn btn-hapus">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Membuat Fitur Laporan Bulanan</td>
                            <td><span class="status status-dikerjakan">Dikerjakan</span></td>
                            <td>
                                <a href="#" class="action-btn btn-detail">Detail</a>
                                <a href="#" class="action-btn btn-hapus">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Desain Ulang Halaman Profil</td>
                            <td><span class="status status-menunggu">Menunggu</span></td>
                            <td>
                                <a href="#" class="action-btn btn-detail">Detail</a>
                                <a href="#" class="action-btn btn-hapus">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>
</html>