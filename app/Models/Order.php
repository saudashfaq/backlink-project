<?php

namespace App\Models;

use App\Enums\BacklinkTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Enums\OrderStatusEnum;
use App\Enums\OrderTypeEnum;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['buyer_id', 'seller_id', 'website_id', 'order_type', 'content_required', 'order_status', 'order_value', 'accepted_at', 'completed_at', 'rejected_at', 'review_deadline', 'revision_deadline'];

    // Relationships
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }

    public function guestpostDetail(): HasOne
    {
        return $this->hasOne(GuestpostDetail::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function orderChats(): HasMany
    {
        return $this->hasMany(OrderChat::class);
    }



    // Enums
    public function getOrderStatus()
    {
        return OrderStatusEnum::getList()[$this->order_status] ?? null;
    }

    public function getBacklinkType()
    {
        return BacklinkTypeEnum::getList()[$this->backlink_type] ?? null;
    }


}
