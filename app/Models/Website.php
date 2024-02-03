<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Website extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'websites';


    protected $fillable = ['user_id', 'url', 'content_available', 'status', 'created_by', 'updated_by', 'deleted_by', 'backlink_rate', 'content_available', 'other_info'];

    // Relationships
    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    
    public function guestpostRates(): HasMany
    {
        return $this->hasMany(WebsiteBacklinkRate::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }


}
