<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('AdminSeeder');
        $this->call('GambarSeeder');
        $this->call('BeritaSeeder');
        $this->call('PrestasiSeeder');
    }
}
