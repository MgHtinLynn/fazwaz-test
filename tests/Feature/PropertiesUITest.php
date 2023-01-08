<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertiesUITest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_localhost_ui()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_localhost_ui_with_wrong_province()
    {
        $response = $this->get('/bkk');

        $response->assertStatus(404);
    }

    public function test_localhost_ui_with_correct_province()
    {
        $response = $this->get('/bangkok');

        $response->assertStatus(200);
    }
}
