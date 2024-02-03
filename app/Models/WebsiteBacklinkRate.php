<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsiteBacklinkRate extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'website_id', 'guestpost_type', 'rate'];

    // User relationship
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Website relationship
    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }

}
