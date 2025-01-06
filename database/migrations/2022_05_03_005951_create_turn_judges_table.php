<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnJudgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turn_judges', function (Blueprint $table) {
            $table->id();
            //$table->unsignedInteger('id');
            $table->string('codex',5);
            $table->string('sajno',8);
            $table->unsignedTinyInteger('bib');
            $table->char('class');
            $table->unsignedTinyInteger('start');
            $table->unsignedTinyInteger('j_id');
            $table->decimal('carving', 4, 1);
            $table->decimal('absext', 4, 1);
            $table->decimal('upper', 4, 1);
            $table->decimal('deduction', 4, 1);
            $table->unsignedTinyInteger('revision');
            $table->timestamps();
            $table->boolean('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turn_judges');
    }
}
