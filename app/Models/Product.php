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
    public function attributes(): BelongsTo
    {
        return $this->belongsTo(Attributes::class,'attributes_id');
    }
}
