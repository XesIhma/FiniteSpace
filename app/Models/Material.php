<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Item
{
    use HasFactory;

    protected $guarded = [];

    public function materialType()
    {
        return $this->belongsTo(MaterialType::class);
    }
}
