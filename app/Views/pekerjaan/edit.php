<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pekerjaan</title>
    <style>
        body{font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;background-color:#f4f7f9;margin:0;color:#333}.page-container{display:flex;min-height:100vh}.sidebar{width:250px;background-color:#2c3e50;color:#ecf0f1;display:flex;flex-direction:column;flex-shrink:0}.sidebar-header{padding:1.5rem;text-align:center;font-size:1.5rem;font-weight:bold;border-bottom:1px solid #34495e}.sidebar-nav{flex-grow:1}.sidebar-nav h3{padding:1rem 1.5rem .5rem;font-size:.8rem;text-transform:uppercase;color:#95a5a6;margin:0}.sidebar-nav ul{list-style:none;padding:0;margin:0}.sidebar-nav ul li a{display:block;color:#ecf0f1;text-decoration:none;padding:1rem 1.5rem;transition:all .3s ease;border-left:3px solid transparent}.sidebar-nav ul li a:hover{background-color:#34495e;border-left:3px solid #3498db}.sidebar-footer{padding:1.5rem}.logout-btn{display:block;width:100%;padding:10px;background-color:#e74c3c;color:#fff;text-decoration:none;border-radius:8px;font-weight:bold;transition:background-color .3s ease;text-align:center;border:none;cursor:pointer}.logout-btn:hover{background-color:#c0392b}.main-content{flex-grow:1;padding:2rem;overflow-y:auto}.header h2{margin:0 0 .5rem;color:#2c3e50}.header p{margin:0 0 2rem;color:#7f8c8d}.content-card{background-color:#fff;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.08);padding:2rem}.content-card h3{margin-top:0;border-bottom:1px solid #eee;padding-bottom:1rem;margin-bottom:2rem}.form-group{margin-bottom:1.5rem}.form-group label{display:block;font-weight:bold;margin-bottom:.5rem;color:#555}.form-control{width:100%;padding:12px 15px;border:1px solid #ddd;border-radius:8px;font-size:1rem;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;box-sizing:border-box;transition:border-color .3s ease}.form-control:focus{outline:none;border-color:#3498db}textarea.form-control{resize:vertical;min-height:120px}.form-actions{display:flex;gap:1rem;margin-top:2rem}.btn{padding:12px 20px;border:none;border-radius:8px;font-weight:bold;font-size:1rem;cursor:pointer;text-decoration:none;text-align:center;transition:all .3s ease}.btn-primary{background-color:#3498db;color:#fff}.btn-primary:hover{background-color:#2980b9}.btn-secondary{background-color:#ecf0f1;color:#333;border:1px solid #bdc3c7}.btn-secondary:hover{background-color:#bdc3c7}
    </style>
</head>
<body>
    <div class="page-container">
        <aside class="sidebar">
            <div class="sidebar-header">Dashboard</div>
            <nav class="sidebar-nav">
                <?php if (isset($role) && $role === 'kepala_pegawai'): ?>
                    <h3>Menu Kepala Pegawai</h3><ul><li><a href="#">Data Pegawai</a></li></ul>
                <?php else: ?>
                    <h3>Menu</h3><ul><li><a href="#">Menu Item</a></li></ul>
                <?php endif; ?>
            </nav>
            <div class="sidebar-footer"><a href="#" class="logout-btn">Logout</a></div>
        </aside>

        <main class="main-content">
            <div class="header">
                <h2>Edit Pekerjaan</h2>
                <p>Ubah detail pekerjaan pada form di bawah ini.</p>
            </div>

            <div class="content-card">
                <h3>Formulir Edit Pekerjaan</h3>
                
                <form action="<?= site_url('pekerjaan/update/' . $pekerjaan['id']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="judul">Judul Pekerjaan</label>
                        <input type="text" id="judul" name="judul" class="form-control" value="<?= old('judul', $pekerjaan['judul']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control"><?= old('deskripsi', $pekerjaan['deskripsi']) ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="menunggu" <?= old('status', $pekerjaan['status']) == 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                            <option value="dikerjakan" <?= old('status', $pekerjaan['status']) == 'dikerjakan' ? 'selected' : '' ?>>Dikerjakan</option>
                            <option value="selesai" <?= old('status', $pekerjaan['status']) == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Pekerjaan</button>
                        <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>