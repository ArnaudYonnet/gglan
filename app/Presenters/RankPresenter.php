<?php

namespace App\Presenters;

use App\Rank;

class RankPresenter {

    protected $rank;

    public function __construct(Rank $rank)
    {
        $this->rank = $rank;
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
        return route('admin.ranks.destroy', $this->rank);
    }

    public function edit()
    {
        return route('admin.ranks.edit', $this->rank);
    }

    public function show()
    {
        return route('admin.ranks.show', $this->rank);
    }    

    public function update()
    {
        return route('admin.ranks.update', $this->rank);
    }
}