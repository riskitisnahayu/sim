<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToUserLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_levels', function(Blueprint $table){ //Blueprint merupakan kelas laravel yang dia digunakan untuk membuat tabel
            $table->foreign('id_user','fk_user_levels_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_levels', function(Blueprint $table){ //Blueprint merupakan kelas laravel yang dia digunakan untuk membuat tabel
            $table->dropForeign('fk_user_levels_users');
        });
    }
}
