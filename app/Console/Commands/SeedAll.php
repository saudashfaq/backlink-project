<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Category;
use App\Models\CategoryWebsite;
use App\Models\Website;
use App\Models\WebsiteBacklinkRate;
use Database\Seeders\WebsiteBacklinkRateSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CategoryWebsiteSeeder;
use Database\Seeders\WebsiteSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
class SeedAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed all seeders step by step';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Truncating and Seeding User, Website, WebsitBacklink and category, Category_Website seeder tables");
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        CategoryWebsite::truncate();
        WebsiteBacklinkRate::truncate();
        Website::truncate();        
        Category::truncate();
        User::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->call('db:seed', ['--class' => UserSeeder::class]);
        $this->call('db:seed', ['--class' => CategorySeeder::class]);
        $this->call('db:seed', ['--class' => WebsiteSeeder::class]);
        $this->call('db:seed', ['--class' => WebsiteBacklinkRateSeeder::class]);
        $this->call('db:seed', ['--class' => CategoryWebsiteSeeder::class]);
        
        $this->info("User, Website, WebsitBacklink and category, Category_Website seeder tables have been seeded");
    }
}
