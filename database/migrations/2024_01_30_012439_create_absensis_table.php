<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->string('no_absen');
            $table->string('nama');
            $table->string('cabang');
            $table->string('posisi');

            // Define columns directly inside the create method
            for ($i = 1; $i <= 31; $i++) {
                $table->string("hari{$i}")->nullable();
            }

            $table->timestamps();
        });
    }

    public function down()
    { 
        Schema::dropIfExists('absensis');
    }
}
