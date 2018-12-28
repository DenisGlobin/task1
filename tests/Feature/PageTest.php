<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;

class PageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/page/1');
        // use the factory to create a Faker\Factory instance
        $faker = Faker::create();
        $response = $this->json('POST', '/', [
            'id' => 1,
            'name' => $faker->name,
            'phone' => '380990000000',
        ])->assertSuccessful();
    }
}
