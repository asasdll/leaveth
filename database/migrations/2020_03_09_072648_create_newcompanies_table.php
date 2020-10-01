<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewcompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newcompanies', function (Blueprint $table) {
            $table->id();
            $table->string('idname');
            $table->string('companyname');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('tel');
            $table->string('tel2')->nullable();
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('newcode')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('newcompanies');
    }
}
