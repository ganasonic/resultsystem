<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_results', function (Blueprint $table) {
            $table->id();
            $table->string('sex',1)->nullable();/*性別*/
            $table->string('class',4)->nullable();/*クラス*/
            $table->string('season',5)->nullable();/*シーズン*/
            $table->string('codex',5)->nullable();/*CODEX*/
            $table->string('sajno',8)->nullable();/*SAJ NO*/
            $table->unsignedTinyInteger('start')->nullable();/*スタートNo*/

            $table->string('name')->nullable();/*選手名*/
            $table->unsignedTinyInteger('bib')->nullable();/*BIB*/
            $table->string('pref')->nullable();/*県連*/
            $table->string('team')->nullable();/*チーム*/
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

            $table->string('air11')->nullable();/*A1-1 技名*/
            $table->string('air12')->nullable();/*A1-2 技名*/
            $table->string('air21')->nullable();/*A2-1 技名*/
            $table->string('air22')->nullable();/*A2-2 技名*/
            $table->string('didnot',4)->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('current_results');
    }
}
