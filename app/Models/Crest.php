<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\FamilyController;

/**
 * Class Crest
 * 
 * @property int $crest_id
 * @property string $crest_url
 * @property int $name_id
 * @property string $caption
 * @property int $clan
 * @property int $condicion
 *
 * @package App\Models
 */
class Crest extends Model
{
	protected $table = 'crest';
	protected $primaryKey = 'crest_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'crest_id' => 'int',
		'name_id' => 'int',
		'clan' => 'int',
		'condicion' => 'int'
	];

	protected $fillable = [
		'crest_url',
		'name_id',
		'caption',
		'clan',
		'condicion'
	];

    public function user()
    {
        return $this->belongsTo(Family::class);
    }}
