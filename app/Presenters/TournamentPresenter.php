<?php

namespace App\Presenters;

use App\Tournament;

class TournamentPresenter {

    protected $tournament;

    public function __construct(Tournament $tournament)
    {
        $this->tournament = $tournament;
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
        return route('admin.tournaments.destroy', $this->tournament);
    }

    public function edit()
    {
        return route('admin.tournaments.edit', $this->tournament);
    }

    public function show()
    {
        return route('admin.tournaments.show', $this->tournament);
    }    

    public function update()
    {
        return route('admin.tournaments.update', $this->tournament);
    }
}