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
            $table->increments('gameID');
            $table->string('name');
            $table->tinyInteger('price');
            $table->enum('ageRating',['PG','3', '7', '12', '16', '18']);
            $table->string('genre');
            $table->mediumText('description');
            $table->tinyInteger('copies');
            $table->string('url');
            $table->string('thumbnail');
            $table->string('platform');
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
