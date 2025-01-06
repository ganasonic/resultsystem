<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gamerank
 * 
 * @property string|null $gamerank
 * @property string|null $category
 *
 * @package App\Models
 */
class Gamerank extends Model
{
	protected $table = 'gamerank';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'gamerank',
		'category'
	];
}
