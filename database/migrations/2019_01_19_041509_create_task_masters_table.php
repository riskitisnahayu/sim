<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('subjectscategories_id')->unsigned();
            $table->enum('class',['7','8','9']);
            $table->enum('semester',['I','II','Both']);
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
        Schema::dropIfExists('task_masters');
    }
}
