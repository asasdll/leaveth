<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSumDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sum_date', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('per_date_sum');//วันลารวม
            $table->string('per_date_user');//วันลาที่ใช้
            $table->string('per_date_surplus');//วันลาที่เหลือ

            $table->string('vac_date_sum');//วันลารวม
            $table->string('vac_date_user');//วันลาที่ใช้
            $table->string('vac_date_surplus');//วันลาที่เหลือ
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
        Schema::dropIfExists('sum_date');
    }
}
