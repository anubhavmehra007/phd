<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMobileNoRemoveInternalExternalToScholars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scholars', function (Blueprint $table) {
            $table->string('mobile_number');
            $table->dropColumn('internal');
            $table->dropColumn('external');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholars', function (Blueprint $table) {
            $table->dropColumn('mobile_number');
            $table->unsignedInteger('internal');
            $table->unsignedInteger('external');
        });
    }
}
