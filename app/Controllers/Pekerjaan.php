<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PekerjaanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pekerjaan extends BaseController
{
    protected $pekerjaanModel;

    public function __construct()
    {
        $this->pekerjaanModel = new PekerjaanModel();
    }

    public function index()
    {
        $data = [
            'username'   => session()->get('username'),
            'role'       => session()->get('role'),
            'pekerjaan'  => $this->pekerjaanModel->findAll()
        ];
        return view('dashboard', $data);
    }

    public function tambah()
    {
        // Hanya kepala pegawai yang boleh mengakses halaman tambah
        if (session()->get('role') !== 'kepala_pegawai') {
            return redirect()->to('/dashboard')->with('errors', 'Anda tidak memiliki izin untuk aksi ini.');
        }

        $data = [
            'username' => session()->get('username'),
            'role'     => session()->get('role'),
        ];
        return view('pekerjaan/tambah', $data);
    }

    public function simpan()
    {
        // Hanya kepala pegawai yang boleh menyimpan
        if (session()->get('role') !== 'kepala_pegawai') {
            return redirect()->to('/dashboard')->with('errors', 'Anda tidak memiliki izin untuk aksi ini.');
        }
        
        if ($this->pekerjaanModel->save($this->request->getPost())) {
            return redirect()->to('/dashboard')->with('success', 'Pekerjaan baru berhasil ditambahkan!');
        } else {
            return redirect()->back()->withInput()->with('errors', 'Gagal menambahkan pekerjaan.');
        }
    }

    public function detail($id)
    {
        // Semua role boleh melihat detail, jadi tidak perlu pengecekan
        $pekerjaan = $this->pekerjaanModel->find($id);
        if (!$pekerjaan) {
            throw PageNotFoundException::forPageNotFound();
        }
        $data = [
            'username'  => session()->get('username'),
            'role'      => session()->get('role'),
            'pekerjaan' => $pekerjaan,
        ];
        return view('pekerjaan/detail', $data);
    }

    public function edit($id)
    {
        // DILINDUNGI: Hanya kepala pegawai yang boleh mengakses halaman edit
        if (session()->get('role') !== 'kepala_pegawai') {
            return redirect()->to('/dashboard')->with('errors', 'Anda tidak memiliki izin untuk aksi ini.');
        }

        $pekerjaan = $this->pekerjaanModel->find($id);
        if (!$pekerjaan) {
            throw PageNotFoundException::forPageNotFound();
        }
        $data = [
            'username'  => session()->get('username'),
            'role'      => session()->get('role'),
            'pekerjaan' => $pekerjaan,
        ];
        return view('pekerjaan/edit', $data);
    }
    
    public function update($id)
    {
        // DILINDUNGI: Hanya kepala pegawai yang boleh memproses update
        if (session()->get('role') !== 'kepala_pegawai') {
            return redirect()->to('/dashboard')->with('errors', 'Anda tidak memiliki izin untuk aksi ini.');
        }
        
        if ($this->pekerjaanModel->update($id, $this->request->getPost())) {
            return redirect()->to('/dashboard')->with('success', 'Pekerjaan berhasil diperbarui!');
        } else {
            return redirect()->back()->withInput()->with('errors', 'Gagal memperbarui pekerjaan.');
        }
    }

    public function hapus($id)
    {
        // DILINDUNGI: Hanya kepala pegawai yang boleh menghapus
        if (session()->get('role') !== 'kepala_pegawai') {
            return redirect()->to('/dashboard')->with('errors', 'Anda tidak memiliki izin untuk aksi ini.');
        }

        $pekerjaan = $this->pekerjaanModel->find($id);
        if ($pekerjaan) {
            $this->pekerjaanModel->delete($id);
            return redirect()->to('/dashboard')->with('success', 'Pekerjaan berhasil dihapus!');
        } else {
            return redirect()->to('/dashboard')->with('errors', 'Pekerjaan tidak ditemukan.');
        }
    }
}