<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 07 Jan 2019 16:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Room
 * 
 * @property int $Id
 * @property string $Number
 * @property int $Type
 * @property string $Description
 * @property bool $Active
 * @property string $Image
 * 
 * @property \Illuminate\Database\Eloquent\Collection $reservations
 *
 * @package App\Models
 */
class Room extends Eloquent
{
	protected $primaryKey = 'Id';
	public $timestamps = false;

	protected $casts = [
		'Type' => 'int',
		'Active' => 'bool'
	];

	protected $fillable = [
		'Number',
		'Type',
		'Description',
		'Active',
		'Image'
	];

	public function reservations()
	{
		return $this->hasMany(\App\Models\Reservation::class, 'RoomId');
	}
}
