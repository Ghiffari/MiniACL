<?php

namespace Ghiffariaq\MiniACL\Models;

use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
    protected $fillable = [
    	'name',
    	'title'
    ];
    public function users()
    {
        return $this->belongsToMany(config('miniacl.user_model'),'user_role','user_id','role_id')->withTimestamps();
    }
}
