<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tmpturn1
 * 
 * @property int|null $bib
 * @property float|null $carving
 * @property float|null $absorption
 * @property float|null $upperbody
 * @property float|null $base
 * @property float|null $deduction
 *
 * @package App\Models
 */
class Tmpturn1 extends Model
{
	protected $table = 'tmpturn1';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'bib' => 'int',
		'carving' => 'float',
		'absorption' => 'float',
		'upperbody' => 'float',
		'base' => 'float',
		'deduction' => 'float'
	];

	protected $fillable = [
		'bib',
		'carving',
		'absorption',
		'upperbody',
		'base',
		'deduction'
	];
}
