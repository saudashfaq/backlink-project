<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryWebsite extends Model
{
    use HasFactory;

    protected $table = 'category_website';
    protected $fillable = ['category_id', 'website_id', 'is_visible'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
