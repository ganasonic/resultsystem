<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJudgeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judge_infos', function (Blueprint $table) {
            $table->id();
            //$table->unsignedInteger('id');
            $table->string('codex',5);
            $table->unsignedTinyInteger('j_id');
            $table->unsignedTinyInteger('j_no');
            $table->string('j_kind');
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
        Schema::dropIfExists('judge_infos');
    }
}
