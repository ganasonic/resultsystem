<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentDmResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_dm_results', function (Blueprint $table) {
            $table->id();
            $table->string('class',4)->nullable();/*クラス*/
            $table->string('season',9)->nullable();/*シーズン*/
            $table->string('codex',5)->nullable();/*CODEX*/
            $table->unsignedTinyInteger('start')->nullable();/*スタートNo*/
            $table->unsignedTinyInteger('judgenum')->nullable();/*judgenum*/

            //青コース
            $table->string('sajno_b',8)->nullable();/*SAJ NO*/
            $table->string('name_b')->nullable();/*選手名*/
            $table->unsignedTinyInteger('bib_b')->nullable();/*BIB*/
            $table->string('didnot_b',4)->nullable();
            $table->string('score_b')->nullable();/*トータルスコア*/
            //赤コース
            $table->string('sajno_r',8)->nullable();/*SAJ NO*/
            $table->string('name_r')->nullable();/*選手名*/
            $table->unsignedTinyInteger('bib_r')->nullable();/*BIB*/
            $table->string('didnot_r',4)->nullable();
            $table->string('score_r')->nullable();/*トータルスコア*/

            $table->decimal('judge1', 4, 1)->nullable();/*J1*/
            $table->decimal('judge2', 4, 1)->nullable();/*J2*/
            $table->decimal('judge3', 4, 1)->nullable();/*J3*/
            $table->decimal('judge4', 4, 1)->nullable();/*J4*/
            $table->decimal('judge5', 4, 1)->nullable();/*J5*/
            $table->decimal('judge6', 4, 1)->nullable();/*J6*/
            $table->decimal('judge7', 4, 1)->nullable();/*J7*/

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
        Schema::dropIfExists('current_dm_results');
    }
}
