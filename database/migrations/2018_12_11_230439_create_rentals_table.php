<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gameID');
            $table->unsignedInteger('memberID');
            $table->date('returnDate');
            $table->boolean('returned')->default(false);
            $table->tinyInteger('extensions')->default(0);
            $table->timestamps();

            $table->foreign('gameID')
            ->references('gameID')->on('games')
            ->onUpdate('cascade');

            $table->foreign('memberID')
            ->references('id')->on('members')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
