<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttributesValues extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'attributes_id',
        'name',
        'status',
    ];

    public function attributes(): BelongsTo
    {
        return $this->belongsTo(Attributes::class,'attributes_id');
    }
}
