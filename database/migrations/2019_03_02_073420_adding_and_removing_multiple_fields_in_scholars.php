<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingAndRemovingMultipleFieldsInScholars extends Migration
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
            
            
            $table->integer("internal_1")->unsigned();
            $table->integer("internal_2")->unsigned();
            $table->integer("internal_3")->unsigned();
            $table->integer("external_1")->unsigned();
            $table->integer("external_2")->unsigned();
            $table->integer("external_3")->unsigned();
            $table->string("enroll_no");
            $table->string("roll_no");
           

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
            $table->dropColumn("internal_1");
            $table->dropColumn("internal_2");
            $table->dropColumn("internal_3");
            $table->dropColumn("external_1");
            $table->dropColumn("external_2");
            $table->dropColumn("external_3");
            $table->dropColumn("enroll_no");
            $table->dropColumn("roll_no");
        });
    }
}
