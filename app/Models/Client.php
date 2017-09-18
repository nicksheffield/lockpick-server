<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
	use SoftDeletes;
	
	protected $table = 'clients';
	
	protected $fillable = [
		'name'
	];
	
	public function sites() {
		return $this->hasMany('App\Models\Site');
	}
}
