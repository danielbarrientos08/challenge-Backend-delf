<?php

namespace Tests\Feature\Item;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
            'Content-Type' => 'application/json'
        ])->getJson('api/items?category_name=beta');

        $response->assertStatus(200);

        $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->where('status', 'success')
                ->hasAll(['data','data.items','data.pagination'])
                ->whereAllType([
                    'data.items.0.id' => 'integer|null',
                    'data.items.0.name' => 'string|null',
                    'data.items.0.description' => 'string|null',
                    'data.items.0.categories' => 'array|null'
                ])
                 ->etc()
        );
        $response->assertHeader('content-type','application/json');
        $response->assertJsonCount(2);

    }
}
