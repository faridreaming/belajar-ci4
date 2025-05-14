<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Database\BaseConnection;

class GenerateSeeder extends BaseCommand
{
    protected $group = 'Database';
    protected $name = 'db:generate-seeder';
    protected $description = 'Generate seeder files from existing database data';

    public function run(array $params)
    {
        $db = db_connect();
        
        // Tables to process
        $tables = ['admin', 'gambar', 'berita', 'prestasi'];
        
        foreach ($tables as $table) {
            $this->generateSeeder($db, $table);
        }
        
        // Generate DatabaseSeeder.php
        $this->generateDatabaseSeeder($tables);
        
        CLI::write('Seeders generated successfully!', 'green');
    }

    private function generateSeeder(BaseConnection $db, string $table)
    {
        $data = $db->table($table)->get()->getResultArray();
        
        if (empty($data)) {
            CLI::write("No data found in table: {$table}", 'yellow');
            return;
        }

        // Handle datetime fields for gambar table
        if ($table === 'gambar') {
            foreach ($data as &$row) {
                if (isset($row['created_at']) && $row['created_at'] === null) {
                    $row['created_at'] = date('Y-m-d H:i:s');
                }
                if (isset($row['updated_at']) && $row['updated_at'] === null) {
                    $row['updated_at'] = date('Y-m-d H:i:s');
                }
            }
        }

        $className = ucfirst($table) . 'Seeder';
        $filePath = APPPATH . 'Database/Seeds/' . $className . '.php';
        
        $seederContent = "<?php\n\n";
        $seederContent .= "namespace App\Database\Seeds;\n\n";
        $seederContent .= "use CodeIgniter\Database\Seeder;\n\n";
        $seederContent .= "class {$className} extends Seeder\n{\n";
        $seederContent .= "    public function run()\n    {\n";
        $seederContent .= "        \$data = " . var_export($data, true) . ";\n\n";
        $seederContent .= "        // Handle datetime fields\n";
        if ($table === 'gambar') {
            $seederContent .= "        foreach (\$data as &\$row) {\n";
            $seederContent .= "            if (empty(\$row['created_at'])) {\n";
            $seederContent .= "                \$row['created_at'] = date('Y-m-d H:i:s');\n";
            $seederContent .= "            }\n";
            $seederContent .= "            if (empty(\$row['updated_at'])) {\n";
            $seederContent .= "                \$row['updated_at'] = date('Y-m-d H:i:s');\n";
            $seederContent .= "            }\n";
            $seederContent .= "        }\n\n";
        }
        $seederContent .= "        \$this->db->table('{$table}')->insertBatch(\$data);\n";
        $seederContent .= "    }\n}\n";

        file_put_contents($filePath, $seederContent);
        CLI::write("Generated seeder for table: {$table}", 'green');
    }

    private function generateDatabaseSeeder(array $tables)
    {
        $filePath = APPPATH . 'Database/Seeds/DatabaseSeeder.php';
        
        $content = "<?php\n\n";
        $content .= "namespace App\Database\Seeds;\n\n";
        $content .= "use CodeIgniter\Database\Seeder;\n\n";
        $content .= "class DatabaseSeeder extends Seeder\n{\n";
        $content .= "    public function run()\n    {\n";
        
        foreach ($tables as $table) {
            $className = ucfirst($table) . 'Seeder';
            $content .= "        \$this->call('{$className}');\n";
        }
        
        $content .= "    }\n}\n";

        file_put_contents($filePath, $content);
        CLI::write("Generated DatabaseSeeder.php", 'green');
    }
} 