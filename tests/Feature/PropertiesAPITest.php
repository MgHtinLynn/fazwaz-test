<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertiesAPITest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_properties_wrong_api()
    {
        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/property');

        $response->assertStatus(404);
    }

    public function test_properties_api()
    {
        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/properties');


        $response->assertJsonStructure([
            'data',
            'current_page',
            'from',
            'last_page',
            'path',
            'per_page',
            'to',
            'total'
        ]);
        $response->assertStatus(200);
    }

    public function test_properties_api_with_wrong_province()
    {
        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/properties', ['province' => 'bkk']);

        $response->assertJsonStructure([
            'data',
            'current_page',
            'from',
            'last_page',
            'path',
            'per_page',
            'to',
            'total'
        ]);

        $response->assertStatus(200);
    }

    public function test_properties_api_with_correct_province()
    {
        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/properties', ['province' => 'bangkok']);

        $response->assertJsonStructure([
            'data',
            'current_page',
            'from',
            'last_page',
            'path',
            'per_page',
            'to',
            'total'
        ]);

        $response->assertStatus(200);
    }

    public function test_properties_api_sale_only()
    {
        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/properties', ['sale' => true]);


        $response->assertJsonStructure([
            'data',
            'current_page',
            'from',
            'last_page',
            'path',
            'per_page',
            'to',
            'total'
        ]);
        $response->assertStatus(200);
    }

    public function test_properties_api_sold_only()
    {
        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/properties', ['sold' => true]);


        $response->assertJsonStructure([
            'data',
            'current_page',
            'from',
            'last_page',
            'path',
            'per_page',
            'to',
            'total'
        ]);
        $response->assertStatus(200);
    }

    public function test_properties_api_search_wrong_text()
    {
        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/properties', ['search' => 'bkk']);


        $response->assertJsonStructure([
            'data',
            'current_page',
            'from',
            'last_page',
            'path',
            'per_page',
            'to',
            'total'
        ]);
        $response->assertStatus(200);
    }

    public function test_properties_api_search_correct_text()
    {
        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/properties', ['search' => 'condo']);


        $response->assertJsonStructure([
            'data',
            'current_page',
            'from',
            'last_page',
            'path',
            'per_page',
            'to',
            'total'
        ]);
        $response->assertStatus(200);
    }

    public function test_properties_api_correct_pagination()
    {
        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/properties', ['page' => 2]);


        $response->assertJsonStructure([
            'data',
            'current_page',
            'from',
            'last_page',
            'path',
            'per_page',
            'to',
            'total'
        ]);
        $response->assertStatus(200);
    }

    public function test_properties_api_wrong_pagination()
    {
        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/properties', ['page' => 99999]);


        $response->assertJsonStructure([
            'data',
            'current_page',
            'from',
            'last_page',
            'path',
            'per_page',
            'to',
            'total'
        ]);
        $response->assertStatus(200);
    }
}
