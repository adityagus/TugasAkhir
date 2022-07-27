<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id');
            // $table->bigInteger('loans_id');
            $table->bigInteger('labs_id');
            $table->string('kd_brg');
            $table->string('nama');
            $table->text('deskripsi');
            $table->integer('jumlah_awal');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
