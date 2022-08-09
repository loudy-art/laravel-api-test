<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $user_id
 * @property string $user_name
 * @property string $user_email
 * @property string $user_pass
 * @property string $level
 * @property string|null $imagen
 * @property bool $condicion
 * @property Carbon $log_time
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'condicion' => 'bool'
	];

	protected $dates = [
		'log_time'
	];

	protected $fillable = [
		'user_id',
		'user_name',
		'user_email',
		'user_pass',
		'level',
		'imagen',
		'condicion',
		'log_time'
	];
}
