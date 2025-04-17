<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'features',
        'price',
        'old_price',
        'stock',
        'image',
        'gallery',
        'featured',
        'rating',
        'reviews_count',
        'colors',
    ];

    protected $casts = [
        'gallery' => 'array',
        'colors' => 'array',
        'featured' => 'boolean',
        'price' => 'float',
        'old_price' => 'float',
        'rating' => 'float',
    ];

    /**
     * Get the category that owns the product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Determine if the product is on sale.
     */
    public function isOnSale(): bool
    {
        return $this->old_price && $this->old_price > $this->price;
    }

    /**
     * Calculate the discount percentage.
     */
    public function discountPercentage(): ?int
    {
        if (!$this->old_price) {
            return null;
        }

        $discount = (($this->old_price - $this->price) / $this->old_price) * 100;
        return (int) round($discount);
    }

    /**
     * Check if the product is in stock.
     */
    public function inStock(): bool
    {
        return $this->stock > 0;
    }
}
