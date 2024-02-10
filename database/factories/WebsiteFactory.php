<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class WebsiteFactory extends Factory
{
    protected $model = Website::class;

    public function definition() :array
    {
        $user_ids = User::select('id')->take(20)->pluck('id')->toArray();
        return [
            'user_id' => $user_ids[array_rand($user_ids)],
            'url' => $this->faker->url,
            'details' => $this->faker->paragraph,
            'website_status' => $this->faker->randomElement(['In Review', 'Rejected', 'Approved']),
            'is_visible' => $this->faker->boolean,
        ];
    }
}
