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
            $table->string('leave_name');//ชื่อ
            $table->string('leave_date');//วันลา
            $table->string('leave_date_up');//วันนลาที่เพิ่ม
            $table->string('leave_date_sum');//วันลารวม
            $table->string('leave_date_user');//วันลาที่ใช้
            $table->string('leave_date_surplus');//วันลาที่เหลือ
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
