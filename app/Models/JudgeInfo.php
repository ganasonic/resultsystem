<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JudgeInfo
 * 
 * @property int $id
 * @property string $codex
 * @property int $j_id
 * @property int $j_no
 * @property string $j_kind
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property bool $delete
 *
 * @package App\Models
 */
class JudgeInfo extends Model
{
	protected $table = 'judge_infos';

	protected $casts = [
		'j_id' => 'int',
		'j_no' => 'int',
		'delete' => 'bool'
	];

	protected $fillable = [
		'codex',
		'j_id',
		'j_no',
		'j_kind',
		'delete'
	];
}
