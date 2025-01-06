<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Licensekey
 * 
 * @property string|null $licensekey
 * @property string|null $databasekey
 *
 * @package App\Models
 */
class Licensekey extends Model
{
	protected $table = 'licensekey';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'licensekey',
		'databasekey'
	];
}
