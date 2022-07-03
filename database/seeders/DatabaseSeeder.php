<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CategoryItem;
use App\Models\Inventory;

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

    User::create([
      'name' => 'Aditya Gustian',
      'roles_id' => 1,
      'email' => 'adityagustian11@gmail.com',
      'password' => bcrypt('aditya123'),
    ]);

      $this->call([
        InventoriesSeeder::class,
        RolesTableSeeder::class,
        CategoryTableSeeder::class,
      ]);

  }
}
