<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LoginAttemp
 * 
 * @property int $id
 * @property string $user_name
 * @property string $ip_adress
 * @property int $failed_login
 * @property bool $blocked
 *
 * @package App\Models
 */
class LoginAttemp extends Model
{
	protected $table = 'login_attemps';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'failed_login' => 'int',
		'blocked' => 'bool'
	];

	protected $fillable = [
		'id',
		'user_name',
		'ip_adress',
		'failed_login',
		'blocked'
	];
}
