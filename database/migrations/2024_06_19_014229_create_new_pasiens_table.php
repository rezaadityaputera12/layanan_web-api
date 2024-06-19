<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewPasiensTable extends Migration
{
    public function up()
    {
        Schema::create('new_pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('telepon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('new_pasiens');
    }
}
