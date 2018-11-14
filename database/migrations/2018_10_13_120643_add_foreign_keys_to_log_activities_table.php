<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToLogActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //bakalan bikin
    {
        Schema::table('log_activities', function(Blueprint $table){ //Blueprint merupakan kelas laravel yang dia digunakan untuk membuat tabel
            $table->foreign('id_user','fk_log_activities_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_game','fk_log_activities_games')->references('id')->on('games')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //delete migrasi
    {
        Schema::table('log_activities', function(Blueprint $table){ //Blueprint merupakan kelas laravel yang dia digunakan untuk membuat tabel
            $table->dropForeign('fk_log_activities_users');
            $table->dropForeign('fk_log_activities_games');
        });
    }
}
