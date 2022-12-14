<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Item
{
    protected $guarded = [];

    public function engineType()
    {
        return $this->belongsTo(EngineType::class);
    }
}
