<?php

namespace Ghiffariaq\MiniACL\Custom;

class Roles
{

    public function constraintWhereIs($query, $role)
    {
        $roles = array_slice(func_get_args(), 1);

        return $query->whereHas('roles', function ($query) use ($roles) {
            $query->whereIn('name', $roles);
        });
    }


    public function constraintWhereIsAll($query, $role)
    {
        $roles = array_slice(func_get_args(), 1);

        return $query->whereHas('roles', function ($query) use ($roles) {
            $query->whereIn('name', $roles);
        }, '=', count($roles));
    }


    public function constraintWhereIsNot($query, $role)
    {
        $roles = array_slice(func_get_args(), 1);

        return $query->whereDoesntHave('roles', function ($query) use ($roles) {
            $query->whereIn('name', $roles);
        });
    }

}
