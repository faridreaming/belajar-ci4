<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTables extends Migration
{
    public function up()
    {
        // Tabel admin
        $this->forge->addField([
            'admin_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
        ]);
        $this->forge->addKey('admin_id', true);
        $this->forge->createTable('admin');

        // Tabel gambar
        $this->forge->addField([
            'gambar_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'jenis' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'nama_file' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'created_at' => [
                'type' => 'DATE',
            ],
            'updated_at' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('gambar_id', true);
        $this->forge->createTable('gambar');

        // Tabel berita
        $this->forge->addField([
            'berita_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'gambar_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'isi' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATE',
            ],
            'updated_at' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('berita_id', true);
        $this->forge->addKey('gambar_id');
        $this->forge->createTable('berita');
    }

    public function down()
    {
        $this->forge->dropTable('berita', true);
        $this->forge->dropTable('gambar', true);
        $this->forge->dropTable('admin', true);
    }
}
