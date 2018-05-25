<?php

namespace App\Presenters;

use App\Role;

class RolePresenter {

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function __get($key)
    {
        if(method_exists($this, $key))
        {
            return $this->$key();
        }

        return $this->$key;
    }

    public function delete()
    {
        return route('admin.roles.destroy', $this->role);
    }

    public function edit()
    {
        return route('admin.roles.edit', $this->role);
    }

    public function show()
    {
        return route('admin.roles.show', $this->role);
    }    

    public function update()
    {
        return route('admin.roles.update', $this->role);
    }
}