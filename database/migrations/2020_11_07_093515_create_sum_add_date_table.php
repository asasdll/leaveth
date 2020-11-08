<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSumAddDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sum_add_date', function (Blueprint $table) {
            $table->id();
            $table->string('id_u')->nullable();
            $table->string('personal_name')->nullable();
            $table->string('personal_date')->nullable();
            $table->string('vacation_name')->nullable();
            $table->string('vacation_date')->nullable();
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
        Schema::dropIfExists('sum_add_date');
    }
}
