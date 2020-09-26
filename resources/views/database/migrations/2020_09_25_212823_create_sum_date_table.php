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
            $table->string('leave_name');
            $table->string('leave_date');
            $table->string('leave_date_up');
            $table->string('leave_date_user');
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
