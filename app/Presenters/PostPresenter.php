<?php

namespace App\Presenters;

use App\Post;

class PostPresenter {

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
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
        return route('admin.posts.destroy', $this->post);
    }

    public function edit()
    {
        return route('admin.posts.edit', $this->post);
    }

    public function update()
    {
        return route('admin.posts.update', $this->post);
    }
}