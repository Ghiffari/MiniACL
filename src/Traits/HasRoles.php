<?php

namespace Ghiffariaq\MiniACL\Traits;

use Ghiffariaq\MiniACL\Models\Role;
use Ghiffariaq\MiniACL\Custom\Roles;
use Session;
use Str;

trait HasRoles
{

    public function roles()
    {
        return $this->belongsToMany('Ghiffariaq\MiniACL\Models\Role','user_role','user_id','role_id')->withTimestamps();
    }

	public function isAn($role)
	{
		return in_array($role, $this->roles->pluck('name')->toArray());
	}

	public function isA($role)
	{
		return $this->isAn($role);
	}

    public function isNotA($role){
        return !$this->isA($role);
    }

	public function scopeWhereIs($query, $role)
    {
        call_user_func_array(
            [new Roles, 'constraintWhereIs'],
            func_get_args()
        );
    }

    public function scopeWhereIsAll($query, $role)
    {
        call_user_func_array(
            [new Roles, 'constraintWhereIsAll'],
            func_get_args()
        );
    }

    public function scopeWhereIsNot($query, $role)
    {
        call_user_func_array(
            [new Roles, 'constraintWhereIsNot'],
            func_get_args()
        );
    }

    public function assign($role)
    {
    	$role_id = Role::firstOrCreate([
    		'name' => $role
    	],[
    		'title' => ucwords($role)
    	])->id;
    	return $this->roles()->syncWithoutDetaching($role_id);
    }

    public function retract($role)
    {
    	$check = Role::where('name',$role)->first();
    	if(!is_null($check)){
    		$this->roles()->detach($check->id);
    		return true;
    	}
    	throw new \Exception("Role Not Found");
    }
}