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
            $table->integer('fkSteps')->unsigned()->nullable();
            $table->foreign('fkSteps')->references('id')->on('steps')->onDelete('cascade');
            $table->integer('fkGuides')->unsigned()->nullable();
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
        Schema::dropIfExists('guides_steps');
    }
}
