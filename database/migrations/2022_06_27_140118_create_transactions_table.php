<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('matakuliah_id');
            $table->bigInteger('labs_id');
            $table->string('name');
            $table->string('nim')->nullable();
            $table->string('kelas')->nullable();
            $table->string('phone')->nullable();
            $table->integer('pertemuan_ke')->nullable();
            $table->string('keperluan')->nullable();
            $table->dateTime('waktupeminjaman')->nullable();
            $table->string('status')->default('PENDING');
            $table->softDeletes();
            $table->timestamps();
        });
        
        /*1. Relasi ke user
          2. nama
          3. nim
          4. kelas
          5. phone
          6. pertemuan-ke
          7. keperluan
          8. laboratorium
          9. Status*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
