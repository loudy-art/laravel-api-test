<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CrestController;

/**
 * Class Family
 * 
 * @property int $name_id
 * @property string $name
 * @property string $info
 * @property int $clan
 * @property string $country
 * @property Carbon $last_update
 * @property int $has_content
 * @property int $condicion
 *
 * @package App\Models
 */
class Family extends Model
{
	protected $table = 'family';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'name_id' => 'int',
		'clan' => 'int',
		'has_content' => 'int',
		'condicion' => 'int'
	];

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'name_id',
		'name',
		'info',
		'clan',
		'country',
		'last_update',
		'has_content',
		'condicion'
	];
	
	public function images()
	{
		return $this->hasMany(Crest::class, 'name_id', 'name_id');
	}

}
