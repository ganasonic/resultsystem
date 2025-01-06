<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirDdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_dd', function (Blueprint $table) {
            $table->string('code',10);/*キー*/
            $table->string('type',10);/*種別*/
            $table->decimal('value_m', 5, 3);/*男子*/
            $table->decimal('value_f', 5, 3);/*女子*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('air_dd');
    }
}
