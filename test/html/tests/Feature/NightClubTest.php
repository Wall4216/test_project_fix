<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\Ref;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NightClubTest extends TestCase
{
    /**
     * Test setting the number of people in the nightclub via API.
     *
     * @return void
     */


    public function testStartPartyRoute()
    {
        $response = $this->get('/api/nightclub/50');

        $response->assertStatus(200);
    }

}

