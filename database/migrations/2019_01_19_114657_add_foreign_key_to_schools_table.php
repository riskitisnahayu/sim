<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->foreign('province_id','fk_schools_provinces')->references('id')->on('provinces')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('regency_id','fk_schools_regencies')->references('id')->on('regencies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('district_id','fk_schools_districts')->references('id')->on('districts')->onUpdate('CASCADE')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {
            //
        });
    }
}
