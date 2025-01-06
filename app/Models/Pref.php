<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pref
 * 
 * @property int|null $no
 * @property string|null $pref
 * @property string|null $logoname
 *
 * @package App\Models
 */
class Pref extends Model
{
	protected $table = 'pref';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'no' => 'int'
	];

	protected $fillable = [
		'no',
		'pref',
		'logoname'
	];
}
