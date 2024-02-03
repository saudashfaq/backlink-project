<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = ['name'];



    public function websites(): BelongsToMany
    {
        return $this->belongsToMany(Website::class);
    }
}
