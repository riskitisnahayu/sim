<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSemesterColumnToTaskMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_masters', function (Blueprint $table) {
            // $table->enum('semester',['I','II','Both'])->nullable()->after('class');
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
