<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('website_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('website_id')->constrained();
            $table->tinyInteger('da')->nullable()->default(0);
            $table->tinyInteger('pa')->nullable()->default(0);
            $table->integer('monthly_traffic')->nullable()->default(0);
            $table->integer('organic_search')->nullable()->default(0);
            $table->tinyInteger('spam_score')->nullable()->default(1);
            $table->date('domain_age')->nullable();
            $table->string('preview_image')->nullable()->comment('This will store the screenshot of the website');

            $table->date('last_crawled_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_scores');
    }
};
