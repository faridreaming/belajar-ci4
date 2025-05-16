<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = array (
  0 => 
  array (
    'admin_id' => '1',
    'username' => 'RA Ar-Rayhan',
    'email' => 'ra-arrayhan@gmail.com',
    'password' => 'arrayhan',
  ),
);

        // Handle datetime fields
        $this->db->table('admin')->insertBatch($data);
    }
}
