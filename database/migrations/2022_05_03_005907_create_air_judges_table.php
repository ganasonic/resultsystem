<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirJudgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_judges', function (Blueprint $table) {
            $table->id();
            //$table->unsignedInteger('id');
            $table->string('codex',5);
            $table->string('sajno',8);
            $table->unsignedTinyInteger('bib');
            $table->char('class');
            $table->unsignedTinyInteger('start');
            $table->unsignedTinyInteger('j_id');
            $table->decimal('point1', 4, 1);
            $table->decimal('max1', 4, 1);
            $table->decimal('gmax1', 4, 1);
            $table->string('ddcode1');
            $table->decimal('dd1', 5, 3);
            $table->decimal('point2', 4, 1);
            $table->decimal('max2', 4, 1);
            $table->decimal('gmax2', 4, 1);
            $table->string('ddcode2');
            $table->decimal('dd2', 5, 3);
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
        Schema::dropIfExists('air_judges');
    }
}
