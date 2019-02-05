<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingEmailAndMarksFieldsToScholars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scholars', function (Blueprint $table) {
            //
            $table->string('email')->unique();
            $table->unsignedInteger('internal');
            $table->unsignedInteger('external');


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
            //
            $table->dropColumn('email');
            $table->dropColumn('internal');
            $table->dropColumn('external');
        });
    }
}
