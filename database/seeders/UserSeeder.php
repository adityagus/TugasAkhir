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
            'roles_id' => 2,
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
          ],
          [
            'name' => 'Kepala Lab',
            'roles_id' => 1,
            'email' => 'kepalalab@kepalalab.com',
            'password' => bcrypt('password'),
          ],
          [
            'name' => 'user',
            'roles_id' => 1,
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
          ],
          [
            'name' => 'Aditya Gustian',
            'roles_id' => 2,
            'email' => 'adityagustian11@gmail.com',
            'password' => bcrypt('aditya123'),
          ],
        ];
        
        User::insert($user);
        
    }
}
