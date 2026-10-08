<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image'
    ];

    public function category(): BelongsTo
    {
        return  $this->belongsTo(Category::class);
    }


    public function scopeInCategory($query, $categoryId)
    {
        return $query->when($categoryId, fn($q) => $q->where('category_id', $categoryId));
    }


    public function scopeSearch($query, $searchTerm)
    {
        return $query->when($searchTerm, fn($q) => $q->where('name', 'like', "%{$searchTerm}%"));
    }
}