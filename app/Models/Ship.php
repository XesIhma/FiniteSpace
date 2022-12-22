<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Item
{
    use HasFactory;

    protected $guarded = [];

    public function shipType()
    {
        return $this->belongsTo(ShipType::class);
    }
}
