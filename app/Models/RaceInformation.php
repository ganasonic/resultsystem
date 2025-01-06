<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaceInformation extends Model
{
    //
	protected $table = 'raceinfo_params';
    protected $keyType = 'string';
    protected $fillable = ['name', 'value', 'value_en'];//データ登録許可するカラムを指定
	public $incrementing = false;
	public $timestamps = false;
}
