<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',190);
            // $table->enum('category',['Arcade', 'Classic', 'Platform', 'Puzzle', 'Racing','Shooter']); //enum == pilihan di dropdown
            $table->integer('gamecategories_id');
            $table->enum('for',['7','8','9'])->nullable();
            $table->string('image')->nullable();
            $table->string('description',190);
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
        Schema::dropIfExists('games');
    }
}
