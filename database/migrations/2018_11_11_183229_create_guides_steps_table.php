<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidesStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkGuidesSteps')->unsigned()->nullable();
            $table->foreign('fkGuidesSteps')->references('id')->on('guides_steps')->onDelete('cascade');
            $table->integer('fkGames')->unsigned()->nullable();
            $table->foreign('fkGames')->references('id')->on('games')->onDelete('cascade');
            $table->integer('fkGuides')->unsigned()->nullable();
            $table->foreign('fkGuides')->references('id')->on('guides')->onDelete('cascade');
            $table->string('name', 100);
            $table->string('pictureLink', 100);

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
        Schema::dropIfExists('guides_steps');
    }
}
