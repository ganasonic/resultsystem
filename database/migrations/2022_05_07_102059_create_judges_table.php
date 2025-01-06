<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJudgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judges', function (Blueprint $table) {
            $table->id();
            //$table->unsignedInteger('id');
            $table->string('fname_j');
            $table->string('mname_j');
            $table->string('gname_j');
            $table->string('fname_e');
            $table->string('mname_e');
            $table->string('gname_e');
            $table->string('pref');
            $table->string('nation');
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
        Schema::dropIfExists('judges');
    }
}
