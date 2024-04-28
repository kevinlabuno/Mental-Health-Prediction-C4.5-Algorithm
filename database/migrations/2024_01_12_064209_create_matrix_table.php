<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrix', function (Blueprint $table) {
            $table->id();
            $table->string('persen');
            $table->string('banyak');
            $table->string('r1');
            $table->string('r2');
            $table->string('r3');
            $table->string('s1');
            $table->string('s2');
            $table->string('s3');
            $table->string('t1');
            $table->string('t2');
            $table->string('t3');
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
        Schema::dropIfExists('matrix');
    }
}
