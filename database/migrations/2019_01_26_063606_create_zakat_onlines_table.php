<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZakatOnlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zakat_online', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_donasi')->nullable()->default(0);
            $table->string('nama_lengkap')->nullable();
            $table->string('email')->nullable();
            $table->string('hp')->nullable();
            $table->string('jenis_donasi')->nullable();
            $table->double('jlh_donasi')->nullable()->default(0);
            $table->string('metode_payment')->nullable();
            $table->string('status_donasi')->nullable();
            $table->string('reference')->nullable();
            $table->string('noVA')->nullable();
            $table->datetime('tanggal_donasi')->nullable();
            $table->datetime('tanggal_payment')->nullable();
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
        Schema::dropIfExists('zakat_online');
    }
}
