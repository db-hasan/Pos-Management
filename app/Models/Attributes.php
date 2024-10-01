<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'priority',
        'status',
    ];
    public function varisions()
    {
        return $this->hasMany(Varision::class, 'attributes_id');
    }
}
