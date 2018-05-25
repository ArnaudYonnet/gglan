<?php

namespace App\Presenters;

use App\Admin;

class AdminPresenter {

    protected $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
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
        return route('admin.admins.destroy', $this->admin);
    }

    public function edit()
    {
        return route('admin.admins.edit', $this->admin);
    }

    public function show()
    {
        return route('admin.admins.show', $this->admin);
    }    

    public function update()
    {
        return route('admin.admins.update', $this->admin);
    }
}