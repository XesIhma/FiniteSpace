<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Item
{
    protected $guarded = [];

    public function shipType()
    {
        return $this->belongsTo(ShipType::class);
    }

    public function cargos()
    {
        return $this->hasMany(Cargo::class);
    }
}
