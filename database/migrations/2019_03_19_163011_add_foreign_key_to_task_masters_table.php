<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToTaskMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_masters', function (Blueprint $table) {
            $table->foreign('subjectscategories_id','fk_task_masters_subjectscategories')->references('id')->on('subjectscategories')->onUpdate('CASCADE')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_masters', function (Blueprint $table) {
            //
        });
    }
}
