<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Title
 * 
 * @property string|null $title
 *
 * @package App\Models
 */
class Title extends Model
{
	protected $table = 'title';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'title'
	];
}
