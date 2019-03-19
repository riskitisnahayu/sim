<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // $table->foreign('user_id','fk_students_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            // $table->foreign('school_id','fk_students_schools')->references('id')->on('schools')->onUpdate('CASCADE')->onDelete('CASCADE');
            // $table->foreign('orangtua_id','fk_students_orangtuas')->references('id')->on('orangtuas')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('province_id','fk_students_provinces')->references('id')->on('provinces')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('regency_id','fk_students_regencies')->references('id')->on('regencies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('district_id','fk_students_districts')->references('id')->on('districts')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}
