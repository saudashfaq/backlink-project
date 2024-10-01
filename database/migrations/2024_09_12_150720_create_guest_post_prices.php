<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestPostPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_post_prices', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('link_type_id');
            $table->integer('language_id');
            $table->integer('category_id');
            $table->decimal('price', 8, 2);
            $table->timestamps();

            // Add foreign keys
            $table->foreign('link_type_id')->references('id')->on('link_types')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_post_prices');
    }
}
