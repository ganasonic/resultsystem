<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AirJudge
 * 
 * @property int $id
 * @property string $codex
 * @property string $sajno
 * @property int $bib
 * @property string $class
 * @property int $start
 * @property int $j_id
 * @property float $point1
 * @property float $max1
 * @property float $gmax1
 * @property string $ddcode1
 * @property float $dd1
 * @property float $point2
 * @property float $max2
 * @property float $gmax2
 * @property string $ddcode2
 * @property float $dd2
 * @property int $revision
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property bool $delete
 *
 * @package App\Models
 */
class AirJudge extends Model
{
	protected $table = 'air_judges';

	protected $casts = [
		'bib' => 'int',
		'start' => 'int',
		'j_id' => 'int',
		'point1' => 'float',
		'max1' => 'float',
		'gmax1' => 'float',
		'dd1' => 'float',
		'point2' => 'float',
		'max2' => 'float',
		'gmax2' => 'float',
		'dd2' => 'float',
		'revision' => 'int',
		'delete' => 'bool'
	];

	protected $fillable = [
		'codex',
		'sajno',
		'bib',
		'class',
		'start',
		'j_id',
		'point1',
		'max1',
		'gmax1',
		'ddcode1',
		'dd1',
		'point2',
		'max2',
		'gmax2',
		'ddcode2',
		'dd2',
		'revision',
		'delete'
	];
}
