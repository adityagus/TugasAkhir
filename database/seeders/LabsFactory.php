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
          'name' => 'Laboratorium Sistem Kendali',
        ],
        [
          'name' => 'Laboratorium Instalasi Listrik',
        ],
        [
          'name' => 'Laboratorium Pemrosesan PCB',
        ],
        [
          'name' => 'Laboratorium Sistem Radio dan Telekomunikasi',
        ],
        [
          'name' => 'Laboratorium Elekronika Analog dan Digital',
        ],
        [
          'name' => 'Laboratorium Jaringan dan Komputer',
        ],
        [
          'name' => 'Laboratorium Sensor dan Tranduser',
        ],
        [
          'name' => 'Laboratorium Komunikasi Bergerak',
        ],
        [
          'name' => 'Laboratorium Pemograman',
        ],
        [
          'name' => 'Laboratorium Sistem Komputer',
        ],
      ];
        Lab::insert($lab);
    }
    
}
