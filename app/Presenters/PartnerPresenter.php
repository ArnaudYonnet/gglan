<?php

namespace App\Presenters;

use App\Partner;

class PartnerPresenter {

    protected $post;

    public function __construct(Partner $partner)
    {
        $this->partner = $partner;
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
        return route('admin.partners.destroy', $this->partner);
    }

    public function edit()
    {
        return route('admin.partners.edit', $this->partner);
    }

    public function update()
    {
        return route('admin.partners.update', $this->partner);
    }
}