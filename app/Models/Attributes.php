<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attributes extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category_id',
        'varision_id',
        'priority',
        'status',
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function varision(): BelongsTo
    {
        return $this->belongsTo(Varision::class,'varision_id');
    }
}
