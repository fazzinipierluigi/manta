<?php

namespace fazzinipierluigi\manta\app\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public static function findByKey($key = NULL)
	{
		if(empty($key) || !is_string($key))
		{
			return NULL;
		}

		$permission = self::where('key', '=', $key)->first();
		if(!empty($permission))
			return $permission;
		else
			return NULL;
	}
}
