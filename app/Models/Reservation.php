<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 07 Jan 2019 16:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Reservation
 * 
 * @property int $Id
 * @property string $Status
 * @property \Carbon\Carbon $CreatedAt
 * @property \Carbon\Carbon $ArrivalDate
 * @property \Carbon\Carbon $DepartureDate
 * @property \Carbon\Carbon $ValidUntil
 * @property int $RoomId
 * @property int $UserId
 * 
 * @property \App\Models\Room $room
 *
 * @package App\Models
 */
class Reservation extends Eloquent
{
	protected $primaryKey = 'Id';
	public $timestamps = false;

	protected $casts = [
		'RoomId' => 'int',
		'UserId' => 'int'
	];

	protected $dates = [
		'CreatedAt',
		'ArrivalDate',
		'DepartureDate',
		'ValidUntil'
	];

	protected $fillable = [
		'Status',
		'CreatedAt',
		'ArrivalDate',
		'DepartureDate',
		'ValidUntil',
		'RoomId',
		'UserId'
	];

	public function room()
	{
		return $this->belongsTo(\App\Models\Room::class, 'RoomId');
	}
}
