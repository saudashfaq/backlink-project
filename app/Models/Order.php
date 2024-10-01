<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyers_id',
        'seller_id',
        'website_id',
        'price',
        'status',
    ];




    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyers_id');
    }

    // Define the relationship with the User model (seller)
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    // Define the relationship with the Website model
    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }


}
