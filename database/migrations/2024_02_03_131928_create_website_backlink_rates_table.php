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
            $table->integer('words_count')->default('350')->comment('the post on which link will be placed will consist of minimum this number of words'); // Add your guest word count
            //$table->boolean('content_writing_included')->default(false);
            $table->decimal('price', 5, 2);
            $table->tinyInteger('max_number_of_links')->default('3')->comment('The buyer can provide this number of links to be posted on the post');
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id');
            $table->index('website_id');
            $table->index('words_count');
            $table->index('price');
            $table->index('max_number_of_links');
            $table->index('is_visible');
            
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
