<?php

use App\Enums\BacklinkTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('websitebacklinkrates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Assuming you have a 'users' table
            $table->foreignId('website_id')->constrained(); // Assuming you have a 'websites' table
            $table->enum('backlink_type', array_keys(BacklinkTypeEnum::getList())); // Add your guest post types
            $table->decimal('rate', 10, 2); // Adjust precision and scale as needed

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websitebacklinkrates');
    }
};
