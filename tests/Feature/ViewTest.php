<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

//#27
class ViewTest extends TestCase
{
    /** @test */
    public function homepage_shows_test_variable()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('This is a test variable'); // match output
    }
}

