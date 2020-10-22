<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    /**
     * Property API test example.
     *
     * @return void
     */
    public function testPropertyGetTest()
    {
        $response = $this->get('/api/v1/properties/filter');

        $response->assertStatus(200);
    }

    public function testPropertyJsonTest()
    {
        $response = $this->json('GET', '/api/v1/properties/filter', [
            'page' => '2',
            'per_page' => '3',
            'name' => 'a',
            'priceFrom' => '200000',
            'priceTo' => '400000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'storeys' => '2',
            'garages' => '2',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'meta' => [
                    'current_page' => '2',
                ],
                'data' => [
                ],
                'links' => [
                ],
            ]);
    }
}
