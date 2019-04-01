<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingDeptIdAndCollegeIdAndTimestampEdditedByToScholar extends Migration
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
            $table->integer('dept_id');
            $table->integer('college_id');
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
        Schema::table('scholars', function (Blueprint $table) {
            //
            $table->dropIfExists('dept_id');
            $table->dropIfExists('college_id');
            $table->dropIfExists('last_edited_by');
            $table->dropTimestamps();
            
        });
    }
}
