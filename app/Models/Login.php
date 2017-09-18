<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Login extends Model
{
	use SoftDeletes;
	
	protected $table = 'logins';
	
	protected $fillable = [
		'username', 'password', 'site_id'
	];
	
	public function site() {
		return $this->belongsTo('App\Models\Site');
	}
}
