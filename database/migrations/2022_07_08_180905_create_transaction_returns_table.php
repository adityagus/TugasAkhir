<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_returns', function (Blueprint $table) {
          $table->id();
          $table->foreignId('transactions_id')->nullable();
          $table->bigInteger('matakuliah_id');
          $table->bigInteger('labs_id');
          $table->string('name')->nullable();
          $table->string('nim')->nullable();
          $table->string('kelas')->nullable();
          $table->string('phone')->nullable();
          $table->integer('pertemuan_ke')->nullable();
          $table->string('keperluan')->nullable();
          $table->string('laboratorium')->nullable();
          $table->string('kondisi')->nullable();
          $table->text('keterangan')->nullable();
          $table->string('status')->default('Verifikasi');
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
        Schema::dropIfExists('transaction_returns');
    }
}
