<?php

namespace Database\Seeders;

use App\Models\Lab;
use Illuminate\Database\Seeder;

class LabsFactory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $lab = [
        [
          'inventory_id' => 1,
          'name' => 'TE',
        ],
        [
          'inventory_id' => 2,
          'name' => 'TL',
        ]
      ];
        Lab::insert($lab);
    }
    
}
