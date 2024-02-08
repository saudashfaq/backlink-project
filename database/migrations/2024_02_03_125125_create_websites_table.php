<?php

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
        Schema::create('websites', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('url');
            $table->text('details')->nullable()->comment('Details about this website, and why it should be considered for the link posting. Will be displayed to the Buyers');
            $table->enum('website_status', ['In Review', 'Rejected', 'Approved'])->default('In Review')->comment('this status is used for pending review, approved, etc');
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
            $table->softDeletes();

            // Index on frequently used columns
            $table->index('url');
            $table->index('user_id');
            $table->index('website_status');
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
        Schema::dropIfExists('websites');
    }
};
