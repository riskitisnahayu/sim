<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyEbookIdTaskmasterIdToLogActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_activities', function (Blueprint $table) {
            $table->foreign('ebook_id','fk_log_activities_ebooks')->references('id')->on('ebooks')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('taskmaster_id','fk_log_activities_task_masters')->references('id')->on('task_masters')->onUpdate('CASCADE')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_activities', function (Blueprint $table) {
            //
        });
    }
}
