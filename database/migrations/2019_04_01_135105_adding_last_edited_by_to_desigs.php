<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingLastEditedByToDesigs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('desigs', function (Blueprint $table) {
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
        Schema::table('desigs', function (Blueprint $table) {
            //
            $table->dropTimestamps();
            $table->dropIfExists('last_edited_by');
        });
    }
}
