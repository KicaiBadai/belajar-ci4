<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pekerjaan Baru</title>
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
            margin-bottom: 2rem;
        }


        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-sizing: border-box; 
            transition: border-color 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #3498db;
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .form-actions {
            display: flex;
            gap: 1rem; 
            margin-top: 2rem;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-secondary {
            background-color: #ecf0f1;
            color: #333;
            border: 1px solid #bdc3c7;
        }
        .btn-secondary:hover {
            background-color: #bdc3c7;
        }
        
  
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
                <h2>Tambah Pekerjaan Baru</h2>
                <p>Isi detail pekerjaan pada form di bawah ini.</p>
            </div>

            <div class="content-card">
                <h3>Formulir Pekerjaan</h3>

                <form action="<?= site_url('pekerjaan/simpan') ?>" method="post">
                    <?= csrf_field() ?> <div class="form-group">
                        <label for="judul">Judul Pekerjaan</label>
                        <input type="text" id="judul" name="judul" class="form-control" placeholder="Contoh: Membuat Fitur Export PDF" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Jelaskan detail dari pekerjaan yang harus dilakukan..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status Awal</label>
                        <select id="status" name="status" class="form-control">
                            <option value="menunggu" selected>Menunggu</option>
                            <option value="dikerjakan">Dikerjakan</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan Pekerjaan</button>
                        <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>
</html>