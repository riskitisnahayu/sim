<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEbookIdTaskmasterIdFiturToLogActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_activities', function (Blueprint $table) {
            $table->integer('ebook_id')->unsigned()->nullable()->after('id_game');
            $table->integer('taskmaster_id')->unsigned()->nullable()->after('ebook_id');
            $table->string('fitur')->nullable()->after('taskmaster_id');
            $table->dropColumn('action');
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
