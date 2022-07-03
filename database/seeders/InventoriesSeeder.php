<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class InventoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventory = [
          [
            'category_id' => mt_rand(1,5),
            'kd_brg' => 'res-213',
            'nama' => 'Resistor 20Ω',
            'deskripsi' => 'Resistor adalah komponen listrik dua terminal pasif yang menerapkan hambatan listrik sebagai elemen rangkaian . Dalam rangkaian elektronik, resistor digunakan untuk mengurangi aliran arus, menyesuaikan level sinyal, untuk membagi tegangan, membiaskan elemen aktif, dan menghentikan saluran transmisi, di antara kegunaan lainnya.',
            'slug' => Str::random(20),
            'jumlah' => '23',
            'satuan' => 'pcs',
          ],
          [
            'category_id' => mt_rand(1,5),
            'kd_brg' => 'Kapasitor-ElCO',
            'nama' => 'Kapasitor ElCO',
            'deskripsi' => 'Resistor adalah komponen listrik dua terminal pasif yang menerapkan hambatan listrik sebagai elemen rangkaian . Dalam rangkaian elektronik, resistor digunakan untuk mengurangi aliran arus, menyesuaikan level sinyal, untuk membagi tegangan, membiaskan elemen aktif, dan menghentikan saluran transmisi, di antara kegunaan lainnya.',
            'slug' => Str::random(20),
            'jumlah' => '23',
            'satuan' => 'pcs',
          ],
          [
            'category_id' => mt_rand(1,5),
            'kd_brg' => 'res-213',
            'nama' => 'Induktor',
            'deskripsi' => 'Resistor adalah komponen listrik dua terminal pasif yang menerapkan hambatan listrik sebagai elemen rangkaian . Dalam rangkaian elektronik, resistor digunakan untuk mengurangi aliran arus, menyesuaikan level sinyal, untuk membagi tegangan, membiaskan elemen aktif, dan menghentikan saluran transmisi, di antara kegunaan lainnya.',
            'slug' => Str::random(20),
            'jumlah' => '23',
            'satuan' => 'pcs',
          ],
          [
            'category_id' => mt_rand(1,5),
            'kd_brg' => 'res-213',
            'nama' => 'Transformator (Trafo)',
            'deskripsi' => 'Resistor adalah komponen listrik dua terminal pasif yang menerapkan hambatan listrik sebagai elemen rangkaian . Dalam rangkaian elektronik, resistor digunakan untuk mengurangi aliran arus, menyesuaikan level sinyal, untuk membagi tegangan, membiaskan elemen aktif, dan menghentikan saluran transmisi, di antara kegunaan lainnya.',
            'slug' => Str::random(20),
            'jumlah' => '23',
            'satuan' => 'pcs',
          ],
          [
            'category_id' => mt_rand(1,5),
            'kd_brg' => 'res-213',
            'nama' => 'Transistor',
            'deskripsi' => 'Resistor adalah komponen listrik dua terminal pasif yang menerapkan hambatan listrik sebagai elemen rangkaian . Dalam rangkaian elektronik, resistor digunakan untuk mengurangi aliran arus, menyesuaikan level sinyal, untuk membagi tegangan, membiaskan elemen aktif, dan menghentikan saluran transmisi, di antara kegunaan lainnya.',
            'slug' => Str::random(20),
            'jumlah' => '23',
            'satuan' => 'pcs',
          ],
          [
            'category_id' => mt_rand(1,5),
            'kd_brg' => 'res-213',
            'nama' => 'Dioda',
            'deskripsi' => 'Resistor adalah komponen listrik dua terminal pasif yang menerapkan hambatan listrik sebagai elemen rangkaian . Dalam rangkaian elektronik, resistor digunakan untuk mengurangi aliran arus, menyesuaikan level sinyal, untuk membagi tegangan, membiaskan elemen aktif, dan menghentikan saluran transmisi, di antara kegunaan lainnya.',
            'slug' => Str::random(20),
            'jumlah' => '23',
            'satuan' => 'pcs',
          ],
          [
            'category_id' => mt_rand(1,5),
            'kd_brg' => 'res-213',
            'nama' => 'Relay',
            'deskripsi' => 'Resistor adalah komponen listrik dua terminal pasif yang menerapkan hambatan listrik sebagai elemen rangkaian . Dalam rangkaian elektronik, resistor digunakan untuk mengurangi aliran arus, menyesuaikan level sinyal, untuk membagi tegangan, membiaskan elemen aktif, dan menghentikan saluran transmisi, di antara kegunaan lainnya.',
            'slug' => Str::random(20),
            'jumlah' => '23',
            'satuan' => 'pcs',
          ],
          [
            'category_id' => mt_rand(1,5),
            'kd_brg' => 'res-213',
            'nama' => 'Integrated Circuit (IC)',
            'deskripsi' => 'Resistor adalah komponen listrik dua terminal pasif yang menerapkan hambatan listrik sebagai elemen rangkaian . Dalam rangkaian elektronik, resistor digunakan untuk mengurangi aliran arus, menyesuaikan level sinyal, untuk membagi tegangan, membiaskan elemen aktif, dan menghentikan saluran transmisi, di antara kegunaan lainnya.',
            'slug' => Str::random(20),
            'jumlah' => '23',
            'satuan' => 'pcs',
          ],
          [
            'category_id' => mt_rand(1,5),
            'kd_brg' => 'res-213',
            'nama' => 'Switch Button',
            'deskripsi' => 'Resistor adalah komponen listrik dua terminal pasif yang menerapkan hambatan listrik sebagai elemen rangkaian . Dalam rangkaian elektronik, resistor digunakan untuk mengurangi aliran arus, menyesuaikan level sinyal, untuk membagi tegangan, membiaskan elemen aktif, dan menghentikan saluran transmisi, di antara kegunaan lainnya.',
            'slug' => Str::random(20),
            'jumlah' => '23',
            'satuan' => 'pcs',
          ],
          [
            'category_id' => mt_rand(1,5),
            'kd_brg' => 'res-213',
            'nama' => 'Switch Button',
            'deskripsi' => 'Resistor adalah komponen listrik dua terminal pasif yang menerapkan hambatan listrik sebagai elemen rangkaian . Dalam rangkaian elektronik, resistor digunakan untuk mengurangi aliran arus, menyesuaikan level sinyal, untuk membagi tegangan, membiaskan elemen aktif, dan menghentikan saluran transmisi, di antara kegunaan lainnya.',
            'slug' => Str::random(20),
            'jumlah' => '23',
            'satuan' => 'pcs',
          ],
          [
            'category_id' => mt_rand(1,5),
            'kd_brg' => 'res-213',
            'nama' => 'Switch Button',
            'slug' => Str::random(20),
            'deskripsi' => 'Resistor adalah komponen listrik dua terminal pasif yang menerapkan hambatan listrik sebagai elemen rangkaian . Dalam rangkaian elektronik, resistor digunakan untuk mengurangi aliran arus, menyesuaikan level sinyal, untuk membagi tegangan, membiaskan elemen aktif, dan menghentikan saluran transmisi, di antara kegunaan lainnya.',
            'slug' => Str::random(20),
            'jumlah' => '23',
            'satuan' => 'pcs',
          ],
          [
            'category_id' => mt_rand(1,5),
            'kd_brg' => 'res-213',
            'nama' => 'Switch Button',
            'deskripsi' => 'Resistor adalah komponen listrik dua terminal pasif yang menerapkan hambatan listrik sebagai elemen rangkaian . Dalam rangkaian elektronik, resistor digunakan untuk mengurangi aliran arus, menyesuaikan level sinyal, untuk membagi tegangan, membiaskan elemen aktif, dan menghentikan saluran transmisi, di antara kegunaan lainnya.',
            'slug' => Str::random(20),
            'jumlah' => '23',
            'satuan' => 'pcs',
          ],
        ];
        
        Inventory::insert($inventory);
    }
}
