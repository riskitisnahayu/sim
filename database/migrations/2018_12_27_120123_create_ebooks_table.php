<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('title',190);
            $table->integer('subjectscategories_id')->unsigned();
            $table->enum('class',['1','2','3'])->nullable();
            $table->enum('semester',['I','II','Both'])->nullable();
            $table->string('author',190);
            $table->string('publisher',190);
            $table->integer('year');
            $table->string('url',190);
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
        Schema::dropIfExists('ebooks');
    }
}
