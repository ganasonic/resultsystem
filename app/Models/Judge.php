<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Judge
 * 
 * @property int $id
 * @property string $fname_j
 * @property string $mname_j
 * @property string $gname_j
 * @property string $fname_e
 * @property string $mname_e
 * @property string $gname_e
 * @property string $pref
 * @property string $nation
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property bool $delete
 *
 * @package App\Models
 */
class Judge extends Model
{
	protected $table = 'judges';

	protected $casts = [
		'delete' => 'bool'
	];

	protected $fillable = [
		'fname_j',
		'mname_j',
		'gname_j',
		'fname_e',
		'mname_e',
		'gname_e',
		'pref',
		'nation',
		'delete'
	];
}
