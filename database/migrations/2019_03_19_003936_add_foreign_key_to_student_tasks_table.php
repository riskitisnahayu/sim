<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToStudentTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_tasks', function (Blueprint $table) {
            $table->foreign('student_id','fk_student_tasks_students')->references('id')->on('students')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('taskmaster_id','fk_student_tasks_task_masters')->references('id')->on('task_masters')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_tasks', function (Blueprint $table) {
            //
        });
    }
}
