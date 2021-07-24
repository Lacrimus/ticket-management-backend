<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /*
    public function testIndex()
    {
        $response = $this->get('/tickets');

        $response->assertStatus(200);
        $response->assertHeader('GET');
    }

    public function testPost()
    {
        $response = $this->post('/user', ['name' => 'TestUser']);

        $response->assertStatus(201);
    }
    */
}
