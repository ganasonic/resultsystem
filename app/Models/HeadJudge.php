<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HeadJudge
 * 
 * @property int $id
 * @property string $codex
 * @property string $sajno
 * @property int $bib
 * @property string $class
 * @property int $start
 * @property int $rank
 * @property string $result
 * @property string $time
 * @property int $t1_id
 * @property int $t2_id
 * @property int $t3_id
 * @property int $t4_id
 * @property int $t5_id
 * @property int $a1_id
 * @property int $a2_id
 * @property string $score
 * @property int $tiebreak
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property bool $delete
 *
 * @package App\Models
 */
class HeadJudge extends Model
{
	protected $table = 'head_judges';

	protected $casts = [
		'bib' => 'int',
		'start' => 'int',
		'rank' => 'int',
		't1_id' => 'int',
		't2_id' => 'int',
		't3_id' => 'int',
		't4_id' => 'int',
		't5_id' => 'int',
		'a1_id' => 'int',
		'a2_id' => 'int',
		'tiebreak' => 'int',
		'delete' => 'bool'
	];

	protected $fillable = [
		'codex',
		'sajno',
		'bib',
		'class',
		'start',
		'rank',
		'result',
		'time',
		't1_id',
		't2_id',
		't3_id',
		't4_id',
		't5_id',
		'a1_id',
		'a2_id',
		'score',
		'tiebreak',
		'delete'
	];
}
