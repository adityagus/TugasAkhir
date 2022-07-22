<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CategoryItem;
use App\Models\Inventory;
use App\Models\Mahasiswa;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();
    Mahasiswa::factory(10)->create();
    
    $this->call([
        UserSeeder::class,
        InventoriesSeeder::class,
        RolesTableSeeder::class,
        CategoryTableSeeder::class,
        LabsFactory::class,
      ]);

  }
}
