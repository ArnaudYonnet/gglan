<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomepageTest extends TestCase
{
    /**
     * Get the homepage
     *
     * @return void
     */
    public function getHomepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
