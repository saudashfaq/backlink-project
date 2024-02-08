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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('order_id')->nullable()->constrained('orders');
            $table->decimal('amount', 5, 2);
            $table->enum('transaction_type', ['Credit', 'Debit']);//get enum from the class
            $table->enum('event_type', ['Withdraw Request', 'Topup Account', 'Purchased Guestpost', 'Sold Guestpost']); //get enum from the class
            
            // Index on frequently used columns
            $table->index('user_id');
            $table->index('order_id');
            $table->index('transaction_type');

            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

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
        Schema::dropIfExists('transactions');
    }
};
