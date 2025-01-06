<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RacerF
 * 
 * @property string|null $SAJNO
 * @property string|null $FISNO
 * @property string|null $氏名R
 * @property string|null $氏名漢
 * @property string|null $国名
 * @property string|null $県連盟
 * @property float|null $FIS_AEﾎﾟｲﾝﾄ
 * @property float|null $FIS_HPﾎﾟｲﾝﾄ
 * @property float|null $FIS_MOﾎﾟｲﾝﾄ
 * @property float|null $FIS_SXﾎﾟｲﾝﾄ
 * @property float|null $FIS_SSﾎﾟｲﾝﾄ
 * @property float|null $FIS_BAﾎﾟｲﾝﾄ
 * @property float|null $SAJ_AEﾎﾟｲﾝﾄ
 * @property float|null $SAJ_HPﾎﾟｲﾝﾄ
 * @property float|null $SAJ_MOﾎﾟｲﾝﾄ
 * @property float|null $SAJ_SXﾎﾟｲﾝﾄ
 * @property float|null $SAJ_SSﾎﾟｲﾝﾄ
 * @property float|null $SAJ_BAﾎﾟｲﾝﾄ
 * @property string|null $所属
 * @property Carbon|null $生年月日
 * @property string|null $ｸﾗｽ
 * @property string|null $氏名2
 * @property string|null $学年
 * @property string|null $競技者ｺｰﾄﾞ
 * @property string|null $姓
 * @property string|null $名
 * @property string|null $ｾｲ
 * @property string|null $ﾒｲ
 * @property string|null $sei
 * @property string|null $mei
 * @property string|null $連盟ｺｰﾄﾞ
 * @property string|null $ﾁｰﾑﾖﾐｶﾞﾅ
 *
 * @package App\Models
 */
class RacerF extends Model
{
	protected $table = 'racer_f';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'FIS_AEﾎﾟｲﾝﾄ' => 'float',
		'FIS_HPﾎﾟｲﾝﾄ' => 'float',
		'FIS_MOﾎﾟｲﾝﾄ' => 'float',
		'FIS_SXﾎﾟｲﾝﾄ' => 'float',
		'FIS_SSﾎﾟｲﾝﾄ' => 'float',
		'FIS_BAﾎﾟｲﾝﾄ' => 'float',
		'SAJ_AEﾎﾟｲﾝﾄ' => 'float',
		'SAJ_HPﾎﾟｲﾝﾄ' => 'float',
		'SAJ_MOﾎﾟｲﾝﾄ' => 'float',
		'SAJ_SXﾎﾟｲﾝﾄ' => 'float',
		'SAJ_SSﾎﾟｲﾝﾄ' => 'float',
		'SAJ_BAﾎﾟｲﾝﾄ' => 'float'
	];

	protected $dates = [
		'生年月日'
	];

	protected $fillable = [
		'SAJNO',
		'FISNO',
		'氏名R',
		'氏名漢',
		'国名',
		'県連盟',
		'FIS_AEﾎﾟｲﾝﾄ',
		'FIS_HPﾎﾟｲﾝﾄ',
		'FIS_MOﾎﾟｲﾝﾄ',
		'FIS_SXﾎﾟｲﾝﾄ',
		'FIS_SSﾎﾟｲﾝﾄ',
		'FIS_BAﾎﾟｲﾝﾄ',
		'SAJ_AEﾎﾟｲﾝﾄ',
		'SAJ_HPﾎﾟｲﾝﾄ',
		'SAJ_MOﾎﾟｲﾝﾄ',
		'SAJ_SXﾎﾟｲﾝﾄ',
		'SAJ_SSﾎﾟｲﾝﾄ',
		'SAJ_BAﾎﾟｲﾝﾄ',
		'所属',
		'生年月日',
		'ｸﾗｽ',
		'氏名2',
		'学年',
		'競技者ｺｰﾄﾞ',
		'姓',
		'名',
		'ｾｲ',
		'ﾒｲ',
		'sei',
		'mei',
		'連盟ｺｰﾄﾞ',
		'ﾁｰﾑﾖﾐｶﾞﾅ'
	];
}
