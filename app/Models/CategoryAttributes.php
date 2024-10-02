<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryAttributes extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'categories_id',
        'attributes_id',
        'priority',
        'status',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'categories_id');
    }

    public function attributes(): BelongsTo
    {
        return $this->belongsTo(Attributes::class,'attributes_id');
    }
}
