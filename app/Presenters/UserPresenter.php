<?php

namespace App\Presenters;

use App\User;

class UserPresenter {

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
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
        return route('admin.users.destroy', $this->user);
    }

    public function edit()
    {
        return route('admin.users.edit', $this->user);
    }

    public function update()
    {
        return route('admin.users.update', $this->user);
    }
}