<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fscourse
 * 
 * @property string|null $saj_homologation
 * @property string|null $fis_homologation
 * @property string|null $prefecture
 * @property string|null $snowparkname
 * @property string|null $course_jp
 * @property string|null $course_en
 * @property string|null $area
 *
 * @package App\Models
 */
class Fscourse extends Model
{
	protected $table = 'fscourse';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'saj_homologation',
		'fis_homologation',
		'prefecture',
		'snowparkname',
		'course_jp',
		'course_en',
		'area'
	];
}
