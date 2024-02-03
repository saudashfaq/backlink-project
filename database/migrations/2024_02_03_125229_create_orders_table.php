<?php

use App\Enums\BacklinkTypeEnum;
use App\Enums\OrderStatusEnum;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->constrained('users');
            $table->foreignId('seller_id')->constrained('users');
            $table->foreignId('website_id')->constrained('websites');
            $table->boolean('content_required');
            $table->enum('backlink_type', BacklinkTypeEnum::getList())->default(BacklinkTypeEnum::BACKLINK);
            $table->decimal('order_amount', 10, 2);
            $table->text('order_details')->comment('[{"linkurl": "", "keyphrase": ""},{"linkurl": "", "keyphrase": ""}]');
            $table->enum('order_status', OrderStatusEnum::getList())->default(OrderStatusEnum::OPEN);
            $table->timestamp('order_status_updated_at')->comment('when this order was updated to current latest status');
            // Index on frequently used columns
            $table->index('buyer_id');
            $table->index('seller_id');
            $table->index('website_id');

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
        Schema::dropIfExists('orders');
    }
};
