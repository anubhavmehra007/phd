<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeptidToGuides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guides', function (Blueprint $table) {
            //
            $table->integer('dept_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guides', function (Blueprint $table) {
            //
        });
        
        $table->dropColumn('dept_id');
        
    }
}
