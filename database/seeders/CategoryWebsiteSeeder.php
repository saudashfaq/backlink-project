<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Website;
use App\Models\CategoryWebsite;

class CategoryWebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::select('id')->take(20)->pluck('id')->toArray();
        $websites = Website::select('id')->take(20)->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            CategoryWebsite::create([
                'category_id' => $categories[array_rand($categories)],
                'website_id' => $websites[array_rand($websites)],
                'is_visible' => rand(0, 1) ?  true : false,
            ]);
        }
    }
}
