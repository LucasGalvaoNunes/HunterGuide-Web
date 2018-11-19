<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidesFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides_favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkUsers')->unsigned();
            $table->foreign('fkUsers')->references('id')->on('users')->onDelete('cascade');
            $table->integer('fkGuides')->unsigned();
            $table->foreign('fkGuides')->references('id')->on('guides')->onDelete('cascade');
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
        Schema::dropIfExists('guides_favorites');
    }
}
