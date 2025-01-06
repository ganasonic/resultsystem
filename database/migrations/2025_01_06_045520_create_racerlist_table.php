<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacerlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('racerlist', function (Blueprint $table) {
            $table->id();
            $table->string('sex',1)->nullable();
            $table->string('season',4)->nullable();
            $table->string('codex',4)->nullable();
            $table->unsignedTinyInteger('start')->nullable();
            $table->unsignedTinyInteger('通番')->nullable();
            $table->float('rand')->nullable();
            $table->char('出欠',2)->nullable();
            $table->string('ｺﾒﾝﾄ',64)->nullable();
            $table->unsignedTinyInteger('BIB')->nullable();
            $table->string('SAJNO',8)->nullable();
            $table->string('FISNO',8)->nullable();
            $table->string('氏名R',128)->nullable();
            $table->string('氏名漢',64)->nullable();
            $table->string('国名',4)->nullable();
            $table->string('県連盟',16)->nullable();
            $table->float('FIS_AEﾎﾟｲﾝﾄ')->nullable();
            $table->float('FIS_HPﾎﾟｲﾝﾄ')->nullable();
            $table->float('FIS_MOﾎﾟｲﾝﾄ')->nullable();
            $table->float('FIS_SXﾎﾟｲﾝﾄ')->nullable();
            $table->float('FIS_SSﾎﾟｲﾝﾄ')->nullable();
            $table->float('SAJ_AEﾎﾟｲﾝﾄ')->nullable();
            $table->float('SAJ_HPﾎﾟｲﾝﾄ')->nullable();
            $table->float('SAJ_MOﾎﾟｲﾝﾄ')->nullable();
            $table->float('SAJ_SXﾎﾟｲﾝﾄ')->nullable();
            $table->float('SAJ_SSﾎﾟｲﾝﾄ')->nullable();
            $table->string('所属')->nullable();
            $table->date('生年月日')->nullable();
            $table->char('ｸﾗｽ',2)->nullable();
            $table->string('氏名2',64)->nullable();
            $table->char('学年',2)->nullable();
            $table->string('競技者ｺｰﾄﾞ',8)->nullable();
            $table->string('姓',32)->nullable();
            $table->string('名',32)->nullable();
            $table->string('ｾｲ',32)->nullable();
            $table->string('ﾒｲ',32)->nullable();
            $table->string('sei',64)->nullable();
            $table->string('mei',64)->nullable();
            $table->string('所属2',64)->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('racerlist');
    }
}
