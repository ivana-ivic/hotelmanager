<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 07 Jan 2019 16:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property int $Id
 * @property string $Name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Role extends Eloquent
{
	protected $primaryKey = 'Id';
	public $timestamps = false;

	protected $fillable = [
		'Name'
	];

	public function users()
	{
		return $this->hasMany(\App\Models\User::class, 'RoleId');
	}
}
