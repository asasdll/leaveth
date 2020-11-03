<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSumTopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sum_top', function (Blueprint $table) {
            $table->id();
            $table->string('id_com')->nullable();
            $table->string('personalleave')->nullable();
            $table->string('personalleave_date')->nullable();
            $table->string('vacationleave')->nullable();
            $table->string('vacationleave_date')->nullable();
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
        Schema::dropIfExists('sum_top');
    }
}
