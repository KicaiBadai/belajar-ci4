<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TabelPekerjaan extends Migration
{
    public function up()
    {
        // Mendefinisikan kolom-kolom untuk tabel 'pekerjaan'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true, // Deskripsi boleh kosong
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['menunggu', 'dikerjakan', 'selesai'],
                'default'    => 'menunggu',
                'null'       => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Menjadikan 'id' sebagai Primary Key
        $this->forge->addKey('id', true);

        // Membuat tabel 'pekerjaan'
        $this->forge->createTable('pekerjaan');
    }

    public function down()
    {
        // Menghapus tabel 'pekerjaan' jika migrasi di-rollback
        $this->forge->dropTable('pekerjaan');
    }
}