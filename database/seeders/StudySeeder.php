<?php

namespace Database\Seeders;

use App\Models\Study;
use Illuminate\Database\Seeder;

class StudySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $studies = [
      [
        'matakuliah' => 'Alat Ukur dan Pengukuran',
      ],
      [
        'matakuliah' => 'Rangkaian Listrik Dasar',
      ],
      [
        'matakuliah' => 'Sistem Komputer',
      ],
      [
        'matakuliah' => 'Dasar Elektronika',
      ],
      [
        'matakuliah' => 'Gambar Teknik',
      ],
      [
        'matakuliah' => 'Teknik Digital Dasar',
      ],
      [
        'matakuliah' => 'Dasar Teknik Listrik',
      ],
      [
        'matakuliah' => 'Instalasi Listrik Dasar',
      ],
      [
        'matakuliah' => 'Rangkaian Listrik Lanjut',
      ],
      [
        'matakuliah' => 'Jaringan Komputer Dasar',
      ],
    ];
    
    Study::insert($studies);
  }
}
