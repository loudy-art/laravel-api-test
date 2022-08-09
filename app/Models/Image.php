<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * 
 * @property int $img_id
 * @property string $image_info
 * @property string $image_url
 * @property int $name_id
 * @property string $type
 * @property int $condicion
 *
 * @package App\Models
 */
class Image extends Model
{
	protected $table = 'image';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'img_id' => 'int',
		'name_id' => 'int',
		'condicion' => 'int'
	];

	protected $fillable = [
		'img_id',
		'image_info',
		'image_url',
		'name_id',
		'type',
		'condicion'
	];
}
