<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MogulAirDd extends Model
{
    //air_dd
	protected $table = 'air_dd';
    protected $keyType = 'string';
    protected $fillable = ['code', 'type', 'value_m', 'value_f'];//データ登録許可するカラムを指定
	public $incrementing = false;
	public $timestamps = false;

}
