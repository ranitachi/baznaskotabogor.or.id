<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatistiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistiks', function (Blueprint $table) {
            $table->increments('id');
            $table->double('jlh_muzzaki')->nullable()->default(0);
            $table->double('jlh_mustahik')->nullable()->default(0);
            $table->double('jlh_penghimpunan')->nullable()->default(0);
            $table->double('jlh_penyaluran')->nullable()->default(0);
            $table->integer('tahun')->nullable()->default(0);
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
        Schema::dropIfExists('statistiks');
    }
}
