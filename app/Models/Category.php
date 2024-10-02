<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'status',
    ];

    public function category_arttributes()
    {
        return $this->hasMany(CategoryAttributes::class, 'categories_id');
    }
    
   
}
