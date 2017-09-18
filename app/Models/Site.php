<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
	use SoftDeletes;
	
	protected $table = 'sites';
	
	protected $fillable = [
		'name', 'url', 'client_id', 'notes'
	];
	
	public function client() {
		return $this->belongsTo('App\Models\Client');
	}

	public function logins() {
		return $this->hasMany('App\Models\Login');
	}
}
