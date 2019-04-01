<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingLastEditedOnAndLastEditedByToDepts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('depts', function (Blueprint $table) {
            //
            $table->timestamps();
            $table->string('last_edited_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('depts', function (Blueprint $table) {
            //
            $table->dropIfExists('last_edited_by');
            $table->dropTimestamps();
        });
    }
}
