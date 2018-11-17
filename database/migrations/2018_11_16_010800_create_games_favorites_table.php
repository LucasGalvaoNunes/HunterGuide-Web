<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkUsers')->unsigned();
            $table->foreign('fkUsers')->references('id')->on('users')->onDelete('cascade');
            $table->integer('fkGames')->unsigned();
            $table->foreign('fkGames')->references('id')->on('games')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('games_favorites');
    }
}
