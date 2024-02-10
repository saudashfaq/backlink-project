<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsiteBacklinkRate extends Model
{
    use HasFactory;

    protected $table = 'websitebacklinkrates';

    protected $fillable = ['user_id', 'website_id', 'words_count', 'price', 'max_number_of_links', 'is_visible'];

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
