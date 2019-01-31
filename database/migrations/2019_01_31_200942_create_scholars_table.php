<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('y_o_j')->unsigned(); //Year of Joining
            $table->integer('y_o_c')->unsigned(); //Year of Completion {0 for uncompleted}
            $table->integer('eta')->unsigned(); // Estimated time of completion
            $table->boolean('course_work'); // {0 for uncompleted 1 for completed}
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholars');
    }
}
