<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category_id',
        'subcategory_id',
        'childcategory_id',
        'innerChild_id',
        'brand_id',
        'size_id',
        'color_id',
        'certification_id',
        'name',
        'purchase_price',
        'wholesale_price ',
        'retail_price',
        'stock_qty',
        'vat',
        'tax',
        'desc',
        'img',
        'status',
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
    public function childcategory(): BelongsTo
    {
        return $this->belongsTo(Childcategory::class,'childcategory_id');
    }
    public function innerChild(): BelongsTo
    {
        return $this->belongsTo(InnerChild::class,'innerChild_id');
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brands::class,'brand_id');
    }
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class,'size_id');
    }
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class,'color_id');
    }
    public function certification(): BelongsTo
    {
        return $this->belongsTo(Certification::class,'certification_id');
    }
}
