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
            $table->string('name',255);
            $table->tinyInteger('price');
            $table->enum('ageRating',['PG','3', '7', '12', '16', '18']);
            $table->string('genre',20);
            $table->string('description',1000);
            $table->tinyInteger('copies');
            $table->string('url',250);
            $table->string('thumbnail',250);
            $table->string('platform',50);
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
