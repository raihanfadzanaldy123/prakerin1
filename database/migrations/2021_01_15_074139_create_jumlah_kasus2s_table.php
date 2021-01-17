<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJumlahKasus2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jumlah_kasus2s', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_negara');
            $table->foreign('id_negara')
                ->references('id')
                ->on('negaras')
                ->onDelete('cascade');
            $table->integer('positif');
            $table->integer('sembuh');
            $table->integer('meninggal');
            $table->date('tanggal');
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
        Schema::dropIfExists('jumlah_kasus2s');
    }
}
