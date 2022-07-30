<?php

namespace Database\Seeders;

use App\Models\StudyProgram;
use Illuminate\Database\Seeder;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $study = [
        [
          'inventory_id' => 1,
          'name' => 'TE',
        ],
        [
          'inventory_id' => 2,
          'name' => 'TL',
        ]
      ];
        StudyProgram::insert($study);
    }
}
