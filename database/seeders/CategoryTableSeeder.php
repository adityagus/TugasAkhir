<?php

namespace Database\Seeders;

use App\Models\CategoryItem;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      $category = [
        [
          'inventory_id' => 1,
          'namakategori' => 'Mudah',
        ],
        [
          'inventory_id' => 2,
          'namakategori' => 'Sedang',
        ],
        [
          'inventory_id' => 3,
          'namakategori' => 'Sulit',
        ],
        [
          'inventory_id' => 4,
          'namakategori' => 'Bahan Umum',
        ],
        [
          'inventory_id' => 5,
          'namakategori' => 'Bahan Khusus',
        ],
      ];
      
    CategoryItem::insert($category);
      
    }
}
