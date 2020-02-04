<?php

namespace fazzinipierluigi\Manta\App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	public function users()
	{
		return $this->hasMany('App\User');
	}

	public function permissions()
	{
		return $this->belongsToMany('\App\Permission');
	}
}
