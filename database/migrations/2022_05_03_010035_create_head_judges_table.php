<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadJudgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_judges', function (Blueprint $table) {
            $table->id();
            //$table->unsignedInteger('id');
            $table->string('codex',5);
            $table->string('sajno',8);
            $table->unsignedTinyInteger('bib');
            $table->char('class');
            $table->unsignedTinyInteger('start');
            $table->unsignedTinyInteger('rank');
            $table->string('result');
            $table->string('time');
            $table->unsignedTinyInteger('t1_id');
            $table->unsignedTinyInteger('t2_id');
            $table->unsignedTinyInteger('t3_id');
            $table->unsignedTinyInteger('t4_id');
            $table->unsignedTinyInteger('t5_id');
            $table->unsignedTinyInteger('a1_id');
            $table->unsignedTinyInteger('a2_id');
            $table->string('score');
            $table->unsignedTinyInteger('tiebreak');
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
        Schema::dropIfExists('head_judges');
    }
}
