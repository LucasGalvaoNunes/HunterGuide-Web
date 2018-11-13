<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkGames')->unsigned();
            $table->foreign('fkGames')->references('id')->on('games')->onDelete('cascade');
            $table->integer('fkCategorys')->unsigned();
            $table->foreign('fkCategorys')->references('id')->on('categorys')->onDelete('cascade');
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
        Schema::dropIfExists('games_categorys');
    }
}
