<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoUserSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        $exists = $db->table('users')->where('email', 'demo@example.com')->countAllResults();
        if (! $exists) {
            $db->table('users')->insert([
                'name' => 'Demo User',
                'email' => 'demo@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
