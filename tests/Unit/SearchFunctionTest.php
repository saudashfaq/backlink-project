<?php

namespace Tests\Unit;

use App\Http\Controllers\WebsiteController;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class SearchFunctionTest extends TestCase
{
    use WithFaker;

    /**
     * A basic unit test example.
     */
    public function testSearch(): void
    {
        $faker = $this->faker;

        for ($i = 0; $i < 20; $i++) {
            $request = new Request([
                'category' => $faker->word,
                'min_price' => $faker->randomFloat(2, 0, 1000),
                'max_price' => $faker->randomFloat(2, 0, 1000),
                'min_word_count' => $faker->numberBetween(0, 1000),
                'max_word_count' => $faker->numberBetween(0, 2000),
                'sorting' => $faker->randomElement(['alphabetical_asc', 'alphabetical_desc', 'price_asc', 'price_desc']),
            ]);

            $controller = app()->make(WebsiteController::class);

            $response = $controller->search($request);

            $this->assertEquals('websites.index', $response->getName());
        }
    }

}
