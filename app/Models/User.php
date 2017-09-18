<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
	use SoftDeletes, HasApiTokens;

	protected $fillable = [
		'name'
	];

	protected $hidden = [
		'password', 'remember_token',
	];
}
