<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKonfirmasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi', function (Blueprint $table) {
            $table->increments('id');  
            $table->string('file')->nullable();
            $table->text('desc')->nullable();
            $table->string('validasi')->nullable();
            $table->date('tgl_transfer')->nullable();
            $table->integer('id_bank')->nullable()->default(0);
            $table->string('nama_pengirim')->nullable();
            $table->string('bank_asal')->nullable();
            $table->double('jumlah')->nullable()->default(0);
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konfirmasi');
    }
}
