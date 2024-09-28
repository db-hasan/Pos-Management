<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Costing extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'costtype_id',
        'amount',
        'note',
        'status',
    ];
    public function costtype(): BelongsTo
    {
        return $this->belongsTo(CostType::class,'costtype_id');
    }
}
