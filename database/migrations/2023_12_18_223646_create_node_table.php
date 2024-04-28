<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node', function (Blueprint $table) {
            $table->id();
            $table->string('ket');
            $table->string('variabel');
            $table->string('kategori')->nullable();
            $table->string('jumlah');
            $table->string('rendah');
            $table->string('sedang');
            $table->string('tinggi');
            $table->string('entropy');
            $table->string('gain')->nullable();
            $table->string('rank')->nullable();
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
        Schema::dropIfExists('node');
    }
}
