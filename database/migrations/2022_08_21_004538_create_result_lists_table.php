<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_lists', function (Blueprint $table) {
            $table->id();
            $table->string('sex',1);/*性別*/
            $table->string('class',4);/*クラス*/
            $table->string('season',5);/*シーズン*/
            $table->string('codex',5)->nullable();/*CODEX*/
            $table->string('sajno',8)->nullable();/*SAJ NO*/
            $table->unsignedTinyInteger('start');/*スタートNo*/

            $table->unsignedTinyInteger('rank')->nullable();/*順位*/
            $table->string('name');/*選手名*/
            $table->unsignedTinyInteger('bib');/*BIB*/
            $table->string('pref')->nullable();/*県連*/
            $table->string('team');/*チーム*/
            $table->string('score')->nullable();/*トータルスコア*/
            $table->decimal('turn', 5, 2)->nullable();/*ターンスコア*/
            $table->decimal('air', 5, 2)->nullable();/*エアスコア*/
            $table->string('air1')->nullable();/*A1 技名*/
            $table->string('air2')->nullable();/*A2 技名*/
            $table->string('sec')->nullable();/*タイム*/

            $table->decimal('turnB1', 4, 1)->nullable();/*ターンスJ1 ベース*/
            $table->decimal('turnD1', 4, 1)->nullable();/*ターンスJ1 減点*/
            $table->decimal('turnB2', 4, 1)->nullable();/*ターンスJ2 ベース*/
            $table->decimal('turnD2', 4, 1)->nullable();/*ターンスJ2 減点*/
            $table->decimal('turnB3', 4, 1)->nullable();/*ターンスJ3 ベース*/
            $table->decimal('turnD3', 4, 1)->nullable();/*ターンスJ3 減点*/
            $table->decimal('turnB4', 4, 1)->nullable();/*ターンスJ4 ベース*/
            $table->decimal('turnD4', 4, 1)->nullable();/*ターンスJ4 減点*/
            $table->decimal('turnB5', 4, 1)->nullable();/*ターンスJ5 ベース*/
            $table->decimal('turnD5', 4, 1)->nullable();/*ターンスJ5 減点*/

            $table->decimal('air1_1', 4, 1)->nullable();/*A1-1 ポイント*/
            $table->decimal('air1_2', 4, 1)->nullable();/*A1-2 ポイント*/
            $table->decimal('air2_1', 4, 1)->nullable();/*A2-1 ポイント*/
            $table->decimal('air2_2', 4, 1)->nullable();/*A2-2 ポイント*/
            $table->string('time')->nullable();/*タイムポイント*/

            $table->decimal('air1_dd', 5, 3)->nullable();/*A1 難度*/
            $table->decimal('air2_dd', 5, 3)->nullable();/*A2 難度*/

            $table->unsignedTinyInteger('tiebreak')->nullable();

            $table->string('didnot',4)->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
            $table->boolean('delete')->nullable();
        });
    }
/*
"rank":"1",
"name":"住吉 輝紗良",
"bib":"3",
"pref":"学連",
"team":"日本大学","
score":"75.09",
"turn":"45.70",
"air":"12.54",
"air1":"bG",
"air2":"bp",
"sec":"27.10",
"turnB1":"16.1",
"turnD1":".6",
"turnT1":"15.5",
"turnB2":"15.3",
"turnD2":".6",
"turnT2":"14.7",
"turnB3":"16.2",
"turnD3":".6",
"turnT3":"15.6",
"turnB4":"15.5",
"turnD4":".4",
"turnT4":"15.1",
"turnB5":"15.7",
"turnD5":".3",
"turnT5":"15.4",
"air1_1":"6.9",
"air1_2":"6.7",
"air2_1":"7.4",
"air2_2":"7.6",
"time":"16.85"

*/
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('result_lists');
    }
}
