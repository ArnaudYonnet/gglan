<?php

namespace App\Presenters;

use App\Team;

class TeamPresenter {

    protected $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
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
        return route('admin.teams.destroy', $this->team);
    }

    public function edit()
    {
        return route('admin.teams.edit', $this->team);
    }

    public function update()
    {
        return route('admin.teams.update', $this->team);
    }
}