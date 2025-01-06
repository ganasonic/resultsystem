<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TurnJudge
 * 
 * @property int $id
 * @property string $codex
 * @property string $sajno
 * @property int $bib
 * @property string $class
 * @property int $start
 * @property int $j_id
 * @property float $carving
 * @property float $absext
 * @property float $upper
 * @property float $deduction
 * @property int $revision
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property bool $delete
 *
 * @package App\Models
 */
class TurnJudge extends Model
{
	protected $table = 'turn_judges';

	protected $casts = [
		'bib' => 'int',
		'start' => 'int',
		'j_id' => 'int',
		'carving' => 'float',
		'absext' => 'float',
		'upper' => 'float',
		'deduction' => 'float',
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
		'carving',
		'absext',
		'upper',
		'deduction',
		'revision',
		'delete'
	];
}
