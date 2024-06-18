<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokterTable extends Migration
{
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('spesialis');
            $table->string('no_telepon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokter');
    }
}
