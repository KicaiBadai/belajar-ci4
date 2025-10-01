<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
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

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
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

        .main-content {
            flex-grow: 1;
            padding: 2rem;
            overflow-y: auto;
        }

        .header h2 {
            margin: 0 0 0.5rem 0;
            color: #2c3e50;
        }

        .header p {
            margin: 0 0 2rem 0;
            color: #7f8c8d;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-size: 1rem;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
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

        .btn-tambah {
            display: inline-block;
            background-color: #3498db;
            color: #ffffff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            margin-bottom: 1.5rem;
            transition: background-color 0.3s ease;
        }

        .btn-tambah:hover {
            background-color: #2980b9;
        }

        .job-table {
            width: 100%;
            border-collapse: collapse;
        }

        .job-table th,
        .job-table td {
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

        .status {
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            color: #fff;
            font-weight: bold;
            text-transform: capitalize;
        }

        .status-selesai {
            background-color: #2ecc71;
        }

        .status-dikerjakan {
            background-color: #3498db;
        }

        .status-menunggu {
            background-color: #f39c12;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            margin-right: 5px;
        }

        .btn-detail {
            background-color: #3498db;
        }

        .btn-hapus {
            background-color: #e74c3c;
        }

        @media (max-width: 768px) {
            .page-container {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                height: auto;
            }

            .btn-tambah {
                display: block;
                text-align: center;
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
                        <li><a href="<?= base_url('users') ?>">Kelola User</a></li>
                        <li><a href="#">Kelola role</a></li>
                        <li><a href="#">Laporan</a></li>
                    </ul>
                <?php elseif ($role === 'admin'): ?>
                    <h3>Menu Admin</h3>
                    <ul>
                        <li><a href="#">Input pegawai</a></li>
                        <li><a href="#">Data pegawai</a></li>
                    </ul>
                <?php elseif ($role === 'kepala_pegawai'): ?>
                    <h3>Menu Kepala Pegawai</h3>
                    <ul>
                        <li><a href="#">Input Data Pekerjaan</a></li>
                        <li><a href="#">Data Pekerjaan</a></li>
                    </ul>
                <?php else: ?>
                    <h3>Menu Pegawai</h3>
                    <ul>
                        <li><a href="#">List Pekerjaan</a></li>
                        <li><a href="#">Riwayat Pekerjaan</a></li>
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

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php elseif (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('errors') ?>
                </div>
            <?php endif; ?>

            <div class="content-card">
                <h3>Daftar Pekerjaan Terbaru</h3>

                <?php if ($role === 'kepala_pegawai'): ?>
                    <a href="<?= site_url('pekerjaan/tambah') ?>" class="btn-tambah">Tambah Pekerjaan Baru</a>
                <?php endif; ?>

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
                        <?php if (!empty($pekerjaan) && is_array($pekerjaan)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($pekerjaan as $job): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($job['judul']) ?></td>
                                    <td>
                                        <span class="status status-<?= esc($job['status']) ?>"><?= esc($job['status']) ?></span>
                                    </td>

                                    <td>
                                        <a href="<?= site_url('pekerjaan/detail/' . $job['id']) ?>" class="action-btn btn-detail">Detail</a>

                                        <?php if (isset($role) && $role === 'kepala_pegawai'): ?>

                                            <a href="<?= site_url('pekerjaan/edit/' . $job['id']) ?>" class="action-btn" style="background-color: #f39c12;">Edit</a>
                                            <a href="<?= site_url('pekerjaan/hapus/' . $job['id']) ?>" class="action-btn btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus pekerjaan ini?')">Hapus</a>

                                        <?php elseif (isset($role) && $role === 'pegawai'): ?>

                                            <a href="<?= site_url('pekerjaan/edit/' . $job['id']) ?>" class="action-btn" style="background-color: #f39c12;">Edit</a>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" style="text-align: center;">Tidak ada data pekerjaan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>
</html>