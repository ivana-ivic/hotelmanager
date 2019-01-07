<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 07 Jan 2019 16:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $Id
 * @property string $Username
 * @property string $Password
 * @property bool $Active
 * @property int $RoleId
 * 
 * @property \App\Models\Role $role
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $primaryKey = 'Id';
	public $timestamps = false;

	protected $casts = [
		'Active' => 'bool',
		'RoleId' => 'int'
	];

	protected $fillable = [
		'Username',
		'Password',
		'Active',
		'RoleId'
	];

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class, 'RoleId');
	}
}
