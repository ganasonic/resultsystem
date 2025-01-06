<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Raceinfo
 * 
 * @property string|null $rank
 * @property string|null $title
 * @property string|null $fistitle
 * @property string|null $season
 * @property string|null $pref
 * @property string|null $place
 * @property string|null $course
 * @property string|null $association
 * @property string|null $race_date
 * @property string|null $category
 * @property string|null $discipline
 * @property string|null $sex
 * @property string|null $codex_sajf
 * @property string|null $codex_sajm
 * @property string|null $codex_fisf
 * @property string|null $codex_fism
 * @property string|null $pointlist_saj
 * @property string|null $pointlist_fis
 *
 * @package App\Models
 */
class Raceinfo extends Model
{
	protected $table = 'raceinfo';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'rank',
		'title',
		'fistitle',
		'season',
		'pref',
		'place',
		'course',
		'association',
		'race_date',
		'category',
		'discipline',
		'sex',
		'codex_sajf',
		'codex_sajm',
		'codex_fisf',
		'codex_fism',
		'pointlist_saj',
		'pointlist_fis'
	];
}
