<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVotesToLeavesTopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leaves_tops', function (Blueprint $table) {
            $table->string('id_company')->nullable()->after('id');
            $table->string('sickleave_date')->nullable()->after('sickleave');
            $table->string('personalleave_date')->nullable()->after('personalleave');
            $table->string('vacationleave_date')->nullable()->after('vacationleave');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leaves_tops', function (Blueprint $table) {
            $table->dropColumn('id_company');
            $table->dropColumn('sickleave_date');
            $table->dropColumn('personalleave_date');
            $table->dropColumn('vacationleave_date');
        });
    }
}
