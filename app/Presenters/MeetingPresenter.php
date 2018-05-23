<?php

namespace App\Presenters;

use App\Meeting;

class MeetingPresenter {

    protected $meeting;

    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
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
        return route('admin.meetings.destroy', $this->meeting);
    }

    public function edit()
    {
        return route('admin.meetings.edit', $this->meeting);
    }

    public function show()
    {
        return route('admin.meetings.show', $this->meeting);
    }    

    public function update()
    {
        return route('admin.meetings.update', $this->meeting);
    }
}