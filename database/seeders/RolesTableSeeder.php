<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
      $roles = [
      [
          'id' => 1,
          'name' => 'KepalaLab'
      ],
      [
          'id' => 2,
          'name' => 'ADMIN'
      ],
      [
          'id' => 3,
          'name' => 'USER'
      ],
      
    ];
    Roles::insert($roles);
      
      
    }
}
