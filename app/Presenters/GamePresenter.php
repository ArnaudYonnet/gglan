<?php

namespace App\Presenters;

use App\Game;

class GamePresenter {

    protected $game;

    public function __construct(Game $game)
    {
        $this->game = $game;
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
        return route('admin.games.destroy', $this->game);
    }

    public function edit()
    {
        return route('admin.games.edit', $this->game);
    }

    public function show()
    {
        return route('admin.games.show', $this->game);
    }    

    public function update()
    {
        return route('admin.games.update', $this->game);
    }
}