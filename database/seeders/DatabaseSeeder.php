<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CategoryItem;
use App\Models\Inventory;
use App\Models\Mahasiswa;
use App\Models\Study;

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
    // Mahasiswa::factory(10)->create();
    
    $this->call([
        UserSeeder::class,
        StudySeeder::class,
        InventoriesSeeder::class,
        RolesTableSeeder::class,
        CategoryTableSeeder::class,
        LabsFactory::class,
        StudyProgramSeeder::class,
      ]);

  }
}
