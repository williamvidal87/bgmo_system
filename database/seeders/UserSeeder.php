<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [ 
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            'dept_id' => 1,
            ],
            [ 
            'name' => 'Client',
            'email' => 'client@gmail.com',
            'password' => bcrypt('client123'),
            'rule_id' => 2,
            'dept_id' => 2,
            ]
        ];

        User::insert($user);
    }
}
