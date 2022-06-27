<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CategoryItem;

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
      'username' => 'adityagus',
      'password' => bcrypt('aditya123'),
    ]);

    CategoryItem::create([
      'inventory_id' => 1,
      'namakategori' => 'Mudah',
    ]);
    CategoryItem::create([
      'inventory_id' => 2,
      'namakategori' => 'Sedang',
    ]);
    CategoryItem::create([
      'inventory_id' => 3,
      'namakategori' => 'Sulit',
    ]);
    CategoryItem::create([
      'inventory_id' => 4,
      'namakategori' => 'Bahan Umum',
    ]);
    CategoryItem::create([
      'inventory_id' => 5,
      'namakategori' => 'Bahan Khusus',
    ]);
    

  }
}
