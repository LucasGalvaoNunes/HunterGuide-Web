<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesConsolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_consoles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkGames')->unsigned();
            $table->foreign('fkGames')->references('id')->on('games')->onDelete('cascade');
            $table->integer('fkConsoles')->unsigned();
            $table->foreign('fkConsoles')->references('id')->on('consoles')->onDelete('cascade');
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
        Schema::dropIfExists('games_consoles');
    }
}
