<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkUsers')->unsigned();
            $table->foreign('fkUsers')->references('id')->on('users')->onDelete('cascade');
            $table->integer('fkGames')->unsigned();
            $table->foreign('fkGames')->references('id')->on('games')->onDelete('cascade');
            $table->integer('visualizations')->nullable()->comment('Is so much visualization this guide receive!');
            $table->string('title', 100)->nullable();
            $table->string('pictureLink', 100)->nullable();
            $table->longText('text');
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
        Schema::dropIfExists('guides');
    }
}
