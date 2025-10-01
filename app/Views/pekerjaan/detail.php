<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pekerjaan</title>
    <style>
        body{font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;background-color:#f4f7f9;margin:0;color:#333}.page-container{display:flex;min-height:100vh}.sidebar{width:250px;background-color:#2c3e50;color:#ecf0f1;display:flex;flex-direction:column;flex-shrink:0}.sidebar-header{padding:1.5rem;text-align:center;font-size:1.5rem;font-weight:bold;border-bottom:1px solid #34495e}.sidebar-nav{flex-grow:1}.sidebar-nav h3{padding:1rem 1.5rem .5rem;font-size:.8rem;text-transform:uppercase;color:#95a5a6;margin:0}.sidebar-nav ul{list-style:none;padding:0;margin:0}.sidebar-nav ul li a{display:block;color:#ecf0f1;text-decoration:none;padding:1rem 1.5rem;transition:all .3s ease;border-left:3px solid transparent}.sidebar-nav ul li a:hover{background-color:#34495e;border-left:3px solid #3498db}.sidebar-footer{padding:1.5rem}.logout-btn{display:block;width:100%;padding:10px;background-color:#e74c3c;color:#fff;text-decoration:none;border-radius:8px;font-weight:bold;transition:background-color .3s ease;text-align:center;border:none;cursor:pointer}.logout-btn:hover{background-color:#c0392b}.main-content{flex-grow:1;padding:2rem;overflow-y:auto}.header h2{margin:0 0 .5rem;color:#2c3e50}.header p{margin:0 0 2rem;color:#7f8c8d}.content-card{background-color:#fff;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.08);padding:2rem}.content-card h3{margin-top:0;border-bottom:1px solid #eee;padding-bottom:1rem;margin-bottom:1.5rem}.detail-list{list-style:none;padding:0}.detail-list li{margin-bottom:1rem;padding-bottom:1rem;border-bottom:1px solid #f0f0f0}.detail-list li:last-child{border-bottom:none;margin-bottom:0}.detail-list strong{display:block;color:#555;margin-bottom:0.4rem}.btn-secondary{display:inline-block;margin-top:2rem;background-color:#ecf0f1;color:#333;border:1px solid #bdc3c7;padding:12px 20px;border-radius:8px;font-weight:bold;text-decoration:none;transition:all .3s ease}.btn-secondary:hover{background-color:#bdc3c7}
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
                <h2>Detail Pekerjaan</h2>
                <p>Informasi lengkap mengenai pekerjaan yang dipilih.</p>
            </div>

            <div class="content-card">
                <h3><?= esc($pekerjaan['judul']) ?></h3>
                <ul class="detail-list">
                    <li>
                        <strong>Status</strong>
                        <span><?= esc($pekerjaan['status']) ?></span>
                    </li>
                    <li>
                        <strong>Deskripsi</strong>
                        <p style="margin:0;"><?= nl2br(esc($pekerjaan['deskripsi'])) ?></p>
                    </li>
                    <li>
                        <strong>Dibuat Pada</strong>
                        <span><?= esc($pekerjaan['created_at']) ?></span>
                    </li>
                     <li>
                        <strong>Terakhir Diperbarui</strong>
                        <span><?= esc($pekerjaan['updated_at']) ?></span>
                    </li>
                </ul>
                <a href="<?= site_url('dashboard') ?>" class="btn-secondary">Kembali ke Dashboard</a>
            </div>
        </main>
    </div>
</body>
</html>