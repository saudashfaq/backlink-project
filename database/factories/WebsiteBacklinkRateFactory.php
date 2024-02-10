<?php

namespace Database\Factories;

use App\Models\WebsiteBacklinkRate;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Website;

class WebsiteBacklinkRateFactory extends Factory
{
    protected $model = WebsiteBacklinkRate::class;

    public function definition() :array
    {
        $user_ids = User::select('id')->pluck('id')->toArray();
        $website_ids = Website::select('id')->pluck('id')->toArray();
        
        return [
            'user_id' => $user_ids[array_rand($user_ids)],
            'website_id' => $website_ids[array_rand($website_ids)] ,
            'words_count' => $this->faker->numberBetween(250, 2000),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'max_number_of_links' => $this->faker->numberBetween(1, 5),
            'is_visible' => $this->faker->boolean,
        ];
    }
}
