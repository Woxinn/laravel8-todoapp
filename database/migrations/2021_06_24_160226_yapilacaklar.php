<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Yapilacaklar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yapilacaklar', function (Blueprint $table) {
            $table->id();
            $table->integer('sahipid');
            $table->integer('listeid');
            $table->string('yapilacak');
            $table->enum('durum',['yapildi','yapilmadi']);
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
        Schema::dropIfExists('yapilacaklar');
    }
}
