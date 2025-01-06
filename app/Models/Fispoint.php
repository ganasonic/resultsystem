<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fispoint
 * 
 * @property int|null $no
 * @property float|null $percent
 * @property float|null $rnk1000
 * @property float|null $rnk500
 * @property float|null $rnk450
 * @property float|null $rnk400
 * @property float|null $rnk360
 * @property float|null $rnk320
 * @property float|null $rnk290
 * @property float|null $rnk260
 * @property float|null $rnk240
 * @property float|null $rnk220
 * @property float|null $rnk200
 * @property float|null $rnk180
 * @property float|null $rnk160
 * @property float|null $rnk150
 * @property float|null $rnk140
 * @property float|null $rnk130
 * @property float|null $rnk120
 * @property float|null $rnk110
 * @property float|null $rnk100
 * @property float|null $rnk90
 * @property float|null $rnk70
 * @property float|null $rnk50
 *
 * @package App\Models
 */
class Fispoint extends Model
{
	protected $table = 'fispoint';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'no' => 'int',
		'percent' => 'float',
		'rnk1000' => 'float',
		'rnk500' => 'float',
		'rnk450' => 'float',
		'rnk400' => 'float',
		'rnk360' => 'float',
		'rnk320' => 'float',
		'rnk290' => 'float',
		'rnk260' => 'float',
		'rnk240' => 'float',
		'rnk220' => 'float',
		'rnk200' => 'float',
		'rnk180' => 'float',
		'rnk160' => 'float',
		'rnk150' => 'float',
		'rnk140' => 'float',
		'rnk130' => 'float',
		'rnk120' => 'float',
		'rnk110' => 'float',
		'rnk100' => 'float',
		'rnk90' => 'float',
		'rnk70' => 'float',
		'rnk50' => 'float'
	];

	protected $fillable = [
		'no',
		'percent',
		'rnk1000',
		'rnk500',
		'rnk450',
		'rnk400',
		'rnk360',
		'rnk320',
		'rnk290',
		'rnk260',
		'rnk240',
		'rnk220',
		'rnk200',
		'rnk180',
		'rnk160',
		'rnk150',
		'rnk140',
		'rnk130',
		'rnk120',
		'rnk110',
		'rnk100',
		'rnk90',
		'rnk70',
		'rnk50'
	];
}
