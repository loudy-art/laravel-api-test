<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mail
 * 
 * @property int $m_id
 * @property string $u_name
 * @property string $message
 *
 * @package App\Models
 */
class Mail extends Model
{
	protected $table = 'mail';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'm_id' => 'int'
	];

	protected $fillable = [
		'm_id',
		'u_name',
		'message'
	];
}
