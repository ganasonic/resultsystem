<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Racerlist
 * 
 * @property int $id
 * @property string|null $sex
 * @property string|null $season
 * @property string|null $codex
 * @property int|null $start
 * @property int|null $通番
 * @property float|null $rand
 * @property string|null $出欠
 * @property string|null $ｺﾒﾝﾄ
 * @property int|null $BIB
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
 * @property float|null $SAJ_AEﾎﾟｲﾝﾄ
 * @property float|null $SAJ_HPﾎﾟｲﾝﾄ
 * @property float|null $SAJ_MOﾎﾟｲﾝﾄ
 * @property float|null $SAJ_SXﾎﾟｲﾝﾄ
 * @property float|null $SAJ_SSﾎﾟｲﾝﾄ
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
 * @property string|null $所属2
 *
 * @package App\Models
 */
class Racerlist extends Model
{
	protected $table = 'racerlist';
	public $timestamps = false;

	protected $casts = [
		'start' => 'int',
		'通番' => 'int',
		'rand' => 'float',
		'BIB' => 'int',
		'FIS_AEﾎﾟｲﾝﾄ' => 'float',
		'FIS_HPﾎﾟｲﾝﾄ' => 'float',
		'FIS_MOﾎﾟｲﾝﾄ' => 'float',
		'FIS_SXﾎﾟｲﾝﾄ' => 'float',
		'FIS_SSﾎﾟｲﾝﾄ' => 'float',
		'SAJ_AEﾎﾟｲﾝﾄ' => 'float',
		'SAJ_HPﾎﾟｲﾝﾄ' => 'float',
		'SAJ_MOﾎﾟｲﾝﾄ' => 'float',
		'SAJ_SXﾎﾟｲﾝﾄ' => 'float',
		'SAJ_SSﾎﾟｲﾝﾄ' => 'float'
	];

	protected $dates = [
		'生年月日'
	];

	protected $fillable = [
		'sex',
		'season',
		'codex',
		'start',
		'通番',
		'rand',
		'出欠',
		'ｺﾒﾝﾄ',
		'BIB',
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
		'SAJ_AEﾎﾟｲﾝﾄ',
		'SAJ_HPﾎﾟｲﾝﾄ',
		'SAJ_MOﾎﾟｲﾝﾄ',
		'SAJ_SXﾎﾟｲﾝﾄ',
		'SAJ_SSﾎﾟｲﾝﾄ',
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
		'所属2'
	];
}
