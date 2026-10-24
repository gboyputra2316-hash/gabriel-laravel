<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // 1. Pastikan baris ini ada

class Book extends Model
{
    protected $fillable = [
        'category_id',
        'publisher_id',
        'title',
        'author_name',
        'price',
        'published_year',
        'cover',
    ];

    // 2. PASTI-KAN method relasi ini ADA dan namanya 'category' (huruf kecil)
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}